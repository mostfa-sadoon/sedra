<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\{Product,ProductFeature,ProductFeatureTranslation,ProductTranslation,ProductImg};
use App\Traits\{response,fileTrait};
use Alert;
use Auth;

class ProductController extends Controller
{
    //
    use response, fileTrait ;
    public function index(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_products'))
        return redirect()->back();

        $selectCategory='both';

        $products=Product::when($request->search_key !=null,function($q)use($request){
           $q->whereHas('producttranslations',function($q)use($request){
               $q->select('product_id','id')->where('name',$request->search_key);
           })

           ->get();
        })
        ->when($request->man !=null && $request->Woman ==null,function($q)use($request){
            $q->where('type','man') ->get();
        })
        ->when($request->Woman !=null && $request->man ==null,function($q)use($request){
           $q->where('type','woman')   ->get();
        })
        ->when($request->Woman !=null  && $request->man !=null ,function($q)use($request){
            $q->get();
        })
        ->orderby('created_at','desc')

        ->paginate(50);

         if($request->man !=null && $request->Woman ==null){
               $selectCategory='man';
         }elseif($request->Woman !=null && $request->man ==null){
              $selectCategory='woman';
         }else{
              $selectCategory='both';
         }

         return view('admin.product.index',compact('products','selectCategory'));
    }
    public function store(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('store_product'))
        return redirect()->back();

         $request->validate([
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
        ]);


        try{
            $main_img=null;
            if($request->main_img!=null){
                $main_img=$this->MoveImage($request->main_img,'uploads/products/main_imgs');
            }
            DB::beginTransaction();

                $product=Product::create([
                    'price'      =>$request->price,
                    'type'       =>$request->category,
                    'count'   =>$request->quantity,
                    'main_img'   =>$main_img,
                ]);

               foreach (config('translatable.locales') as $locale){
                    ProductTranslation::create([
                        'product_id'=>$product->id,
                        'locale'=>$locale,
                        'name'=> $request->$locale['name'],
                        'description' => $request->$locale['desc'],
                    ]);
               }

               $ProductFeatures=[];
               foreach($request->en['feature'] as  $feature){
                    $ProductFeature=ProductFeature::create([
                        'product_id'  =>$product->id,
                    ]);
                    $ProductFeatures[]=$ProductFeature;
               }

               foreach($ProductFeatures as $key=>$ProductFeature){
                    foreach (config('translatable.locales') as $locale){
                        foreach($request->en['feature'] as  $featurekey=>$feature){
                             if($featurekey == $key){
                                ProductFeatureTranslation::create([
                                    'product_feature_id'   =>$ProductFeature->id,
                                    'feature'              =>$request->$locale['feature'][$featurekey],
                                    'locale'               =>$locale,
                                    'value'                =>$request->$locale['value'][$featurekey],
                                ]);
                             }
                        }
                    }
               }
                // add img of product
               foreach($request->images as $img){
                  $img=$this->MoveImage($img,'uploads/products/imgs');
                  ProductImg::create([
                    'product_id'  =>$product->id,
                    'img'         =>$img
                  ]);
               }

            DB::commit();
             Alert::success(__('dashboard.success'), __('dashboard.success_store_order'));
            return redirect()->back();
               }catch(\Exception $ex){
                     return redirect()->back();
               }
    }

    public function edit($id){

         $product=Product::with('productFeatures','imgs')->find($id);
         return view('admin.product.edit',compact('product'));

    }

    public function update(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_product'))
        return redirect()->back();

        $request->validate([
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:0',
        ]);


        //dd($request->all());
        DB::beginTransaction();

        $product=Product::find($request->id);


        // if admin didn't change main_img
        $img_arr=explode("/",$product->main_img);
        $index=(count(explode("/",$product->main_img)))-1;
        $main_img=$img_arr[$index];
        $img_path= public_path('uploads/products/main_imgs/'.$main_img);


        if($request->main_img!=null){
             $main_img=$this->MoveImage($request->main_img,'uploads/products/main_imgs');

            // remove old img
            if (File::exists($img_path)) {

                File::delete($img_path);
                // Optionally, you can also check if the deletion was successful.
            }
        }



        // start update product
        $product->update([
           'price'        =>$request->price,
           'main_img'     =>$main_img,
           'type'     =>$request->category,
           'count'     =>$request->quantity
         ]);


        $ProductTranslations = ProductTranslation::where('product_id',$request->id)->get();
        foreach($ProductTranslations as $ProductTranslation){
            $ProductTranslation->delete();
        }
        foreach (config('translatable.locales') as $locale){
            ProductTranslation::create([
                'product_id'=>$product->id,
                'locale'=>$locale,
                'name'=> $request->$locale['name'],
                'description' => $request->$locale['desc'],
            ]);
        }

        // start update product feature
        $productfeatures  = ProductFeature::where('product_id',$request->id)->get();

         foreach($productfeatures as $ProductFeature){
           $ProductFeature->delete();
         }

       //  dd($request->all());
         if($request->images!=null){

            // delete old imgs
            $productimgs  = ProductImg::where('product_id',$request->id)->get();
            foreach($productimgs as $productimg){

                $img_arr=explode("/",$productimg->img);
                $index=(count(explode("/",$productimg->img)))-1;
                $img=$img_arr[$index];
                $img_path= public_path('uploads/products/main_imgs/'.$img);

                // remove old img
                if (File::exists($img_path)) {

                    File::delete($img_path);
                    // Optionally, you can also check if the deletion was successful.
                }
                $productimg->delete();
            }
             // add new imgs
             foreach($request->images as $img){
                $imageName = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('uploads/products/imgs/'), $imageName); //

                ProductImg::create([
                    'product_id'  =>$request->id,
                    'img'         =>$imageName
                ]);
             }

         }


        // // dd($request->all());
        if(isset($request->ar['feature'])){

            foreach($request->ar['feature'] as $key=>$feature){
                $ProductFeature=ProductFeature::create([
                    'product_id'  =>$product->id,
                ]);

                foreach(config('translatable.locales') as $locale){
                    if($request->$locale['value'][$key]){
                        if($request->$locale['value'][$key]){
                            ProductFeatureTranslation::create([
                                'product_feature_id' =>$ProductFeature->id,
                                'feature'            =>$request->$locale['feature'][$key],
                                'value'              =>$request->$locale['value'][$key],
                                'locale'             =>$locale
                             ]);
                        }
                    }


                }

             }

        }


        Alert::success(__('dashboard.success'), __('dashboard.success_edit_order'));
        DB::commit();
        return redirect()->back();

    }

    public function show($id){



        $product=Product::with('productFeatures','imgs')->find($id);

        return view('admin.product.detailes',compact('product'));
    }

    public function delete(Request $request){
        $product=Product::find($request->id);
         $product->delete();
         Alert::success(__('dashboard.success'), __('dashboard.success'));
         return redirect()->back();
    }


    
}
