<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Campaign,Country,City,CampaignOfficial,CampaignTranslation,UserRegiment,User};
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Alert;
use Auth;

class CampignController extends Controller
{
    //

    public function index($type){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_campaigns'))
        return redirect()->back();
         return view('admin.campaigns.index',compact('type'));
    }

    public function Show($id){

        $campaign=Campaign::with('regiments')->find($id);
        return view('admin.campaigns.detailes',compact('campaign'));

    }






    public function list(Request $request,$type){
         // type 1  new campaign  // type 3 started campaign  // 4 canceled campaign   // 6 distinctcampaign // 7 deleteing requests   8 cancel requests
        if($type==3)
        $operator='<';
        if($type==1)
        $operator='>';
        $query=Campaign::query()->select('campaigns.deleted_at')->join('regiments','regiments.campaign_id','=','campaigns.id');
           if($type==1||$type==3){
             $query ->whereDate('regiments.date',$operator,Carbon::now());

           }elseif($type==4){
             $query->onlyTrashed()->get();
           }elseif($type==7){   
             // deleting  request
            $query ->where('pending_request',1);
           }elseif($type==8){
            // cancel request
            $query ->where('pending_request',2);
           }
            elseif($type==6){
            // distinct camapign
            $query ->where('distinct',true);
           }



        $order = $request['order'];
        $locale = app()->getLocale();

        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query
            ->join('campaign_translations','campaign_translations.campaign_id','=','campaigns.id')

            ->join('companies','campaigns.company_id','=','companies.id')
            ->join('countries','campaigns.country_id','=','countries.id')
            ->join('country_translations','country_translations.country_id','=','countries.id')
            ->join('cities','campaigns.city_id','=','cities.id')
            ->join('city_translations','city_translations.city_id','=','cities.id')

            ->where(function ($query) use ($search,$type) {
                $query

                       ->where('campaign_translations.name', 'like', '%' . $search . '%')
                       ->orwhere('companies.name', 'like', '%' . $search . '%')
                       ->orwhere('city_translations.name', 'like', '%' . $search . '%')
                       ->orwhere('country_translations.name', 'like', '%' . $search . '%')
                ;
                // Add more columns as needed
            });
        }


        // $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        if (isset($order) && count($order)){
            $column = $order[0];
            $query = $query->orderBy($request->columns[+$column['column']]['data'], $column['dir']);
        }

        //$query->orderBy('created_at', $orderDirection);

        // Count total records (needed for pagination)
        $totalRecords = $query->count();

        $start = $request->input('start');
        $length = $request->input('length');
        $query->skip($start)->take($length);


        // $data = $query;


        $data = $query->select('campaigns.id as id','campaigns.distinct','campaigns.created_at as created_at','campaign_translations.name as name','companies.name as company','country_translations.name as country','city_translations.name as city','campaigns.program','single_price','double_price')

        ->groupBy('campaigns.id','campaigns.distinct','campaigns.created_at','campaign_translations.name','companies.name','country_translations.name','city_translations.name','campaigns.program','single_price','double_price')
        ->where('country_translations.locale',app()->getLocale())  ->where('campaign_translations.locale',app()->getLocale())  ->where('city_translations.locale',app()->getLocale())
        ->get()
        ->map(function ($item) use($type){
            return [
                'id'              =>$item->id,
                'name'            =>$item->name,
                'country'         =>$item->country,
                'company'         =>$item->company,
                'city'            =>$item->city,
                'program'         =>$item->program,
                'single_price'    =>$item->single_price,
                'created_at'      =>$item->created_at->format('H:i Y-m-d'),   // Format the date
                'double_price'    =>$item->double_price,
                'type'            =>$type,
                'status'          =>'',
                'options'         =>'',
                'distinct'        =>$item->distinct,
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);
    }

    public function delete(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('delete_campaigns'))
        return redirect()->back();
        try{
            DB::beginTransaction();
                $campaign=Campaign::find($request->id);
                $userregmints =  UserRegiment::where(['campaign_id'=>$campaign->id])
                ->whereDate('date','>',Carbon::now())
                ->get();
                foreach($userregmints as $userregmint){
                    $user=User::find($userregmint->user_id);
                    $user->update([
                        'wallet'=>$user->wallet+ $userregmint->price
                    ]);
                    $userregmint->delete();
                }
            $campaign->delete();
            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.delete'));
           return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }

    public function cancel(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('cancel_campaigns'))
        return redirect()->back();
        try{
            DB::beginTransaction();
                $campaign=Campaign::find($request->id);
                $userregmints =  UserRegiment::where(['campaign_id'=>$campaign->id])
                ->whereDate('date','>',Carbon::now())
                ->get();
                foreach($userregmints as $userregmint){
                    $user=User::find($userregmint->user_id);
                    $user->update([
                        'wallet'=>$user->wallet+ $userregmint->price
                    ]);
                    $userregmint->delete();
                }
            $campaign->delete();
            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.cancel'));
           return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }


    public function edit($id){

        $campaign=Campaign::with('regiments','campaignOfficial','country','city')->find($id);
        $countries=Country::get();

        return view('admin.campaigns.edit',compact('campaign','countries'));
    }

   public function getCities($id){

        $cities=City::where('country_id',$id)->get();
         return $cities;
   }

   public function update(Request $request){
    if(!Auth::guard('web')->user()->hasPermissionTo('update_campaigns'))
    return redirect()->back();
       // dd($request->all());

       DB::beginTransaction();
        $campaign=Campaign::find($request->id);
        $campaignofficial=CampaignOfficial::where('campaign_id',$request->id)->first();
            // if admin didn't change img
            $img_arr=explode("/",$campaign->img);
            $index=(count(explode("/",$campaign->img)))-1;
            $img=$img_arr[$index];

            if($request->img!=null){
                $img=$this->MoveImage($request->img,'uploads/companies/campaigns/');
            }

            $campaign->update([
                'program'        =>$request->program,
                'img'            =>$img,
                'country_id'     =>$request->country,
                'city_id'        =>$request->city,
                'single_price'   =>$request->single_price,
                'double_price'   =>$request->double_price,
                'address'        =>$request->address,
                'persons_count'   =>$request->persons_count
            ]);

            $campaignofficial->update([
            'name'           =>$request->admin_name,
            'phone'          =>$request->admin_number,
            'country_code'   =>$request->country_code

            ]);

            $officials=CampaignTranslation::where('campaign_id',$request->id)->get();

            foreach($officials as $official){
                $official->delete();
            }




            foreach (config('translatable.locales') as $locale){


                    CampaignTranslation::create([
                        'campaign_id'=>$request->id,
                        'locale'=>$locale,
                        'name'=> $request->$locale['name'],
                        'description' => $request->$locale['desc'],
                    ]);

             }
       DB::commit();
       Alert::success(__('dashboard.success'), __('dashboard.update_success'));

       return redirect()->back();


   }

   public function getdistinct(){

    if(!Auth::guard('web')->user()->hasPermissionTo('show_distinct_campaigns'))
    return redirect()->back();

      $campaigns=Campaign::with('country','city','company','UserRegiment')
      ->where('distinct',1)->get();

      return view('admin.campaigns.distinct',compact('campaigns'));
   }

   public function makeDistinct($id){

         $campaign=Campaign::find($id);
         $campaign->update([
             'distinct'=>true
         ]);
         return true;
   }

   public function makeNormal($id){
        $campaign=Campaign::find($id);
        $campaign->update([
            'distinct'=>false
        ]);

        return true;
   }


}
