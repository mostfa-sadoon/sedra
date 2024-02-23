<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{User,UserRegiment};
use App\Traits\{response,fileTrait};
use Illuminate\Support\Facades\File;
use Alert;
use Auth;

class UserController extends Controller
{
    //
    use response,fileTrait;

    public function index(){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_users'))
        return redirect()->back();

        return view('admin.Users.index');
    }

    public function list(Request $request){

        $query=User::query();
        $order = $request['order'];


        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($search) {
                $query->where('users.name', 'like', '%' . $search . '%')
                    ->orWhere('users.phone', 'like', '%' . $search . '%');
                // Add more columns as needed
            });
        }

        $orderDirection = $request->input('order.0.dir');
        if (isset($order) && count($order)){
            $column = $order[0];
            $query = $query->orderBy($request->columns[+$column['column']]['data'], $column['dir']);
        }

        // Count total records (needed for pagination)
        $totalRecords = $query->count();

        $start = $request->input('start');
        $length = $request->input('length');
        $query->skip($start)->take($length);

       // $data = $query;

        $data = $query->get()
        ->map(function ($item) {
            return [
                'id'         => $item->id,
                'name'       => $item->name,
                'phone'      => $item->phone,
                'wallet'     => $item->wallet,
                'created_at' => $item->created_at->format('Y-m-d H:i:s')   // Format the date
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);

    }


    public function show($id){

        $user=User::with(['orders'=>function($q){
            $q->with('items.product','detailes')->paginate(5);
        }

         ,'omravisa'=>function($q){
            $q->paginate(5);
         }

         ,'UserRegiment'=>function($q){
            $q->with('campaign',function($q){
                $q->paginate(5);
            })->active();
         }

         ,'BarcodeTemplate'=>function($q){
           $q->paginate(5);
         }

        ])->find($id);

        return view('admin.Users.show',compact('user'));

    }

    public function getInfo($id){

       $user=User::find($id);
       return view('admin.Users.personalInfo',compact('user'));

    }

    public function updateInfo(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_users'))
        return redirect()->back();

        try{

            DB::beginTransaction();
            $user=User::find($request->id);

            // if admin didn't change img
            $img_arr=explode("/",$user->img);
            $index=(count(explode("/",$user->img)))-1;
            $img=$img_arr[$index];


             // if admin didn't change passport_img
             $passport_img_arr=explode("/",$user->passport_img);
             $index=(count(explode("/",$user->passport_img)))-1;
             $passport_img=$passport_img_arr[$index];

            if($request->passport_img!=null){
                $passport_img=$this->MoveImage($request->passport_img,'uploads/users/passport_img');
            }

            if($request->img!=null){
                $img=$this->MoveImage($request->img,'uploads/users/imgs/');
            }

            $user->update([
                'name'           =>$request->name,
                'passport'       =>$request->passport,
                'passport_img'   =>$passport_img,
                'img'            =>$img
             ]);


             DB::commit();

            Alert::success(__('dashboard.success'), __('dashboard.update_success'));
            return redirect()->back();
        }catch(\Exception $ex){
                return redirect()->back();
        }

    }

    public function getRegmintDetailes($id){

        $userregmint=UserRegiment::with('regiment.campaign.company')->find($id);

        return view('admin.Users.regmint.detailes',compact('userregmint'));
    }


    public function delete(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('delete_users'))
        return redirect()->back();

          $user=User::find($request->id);
          $user->delete();

          return redirect()->back();
    }

    public function updateWallet(Request $request){
            if(!Auth::guard('web')->user()->hasPermissionTo('update_users'))
            return redirect()->back();
            $user=User::find($request->id);
            $user->update([
               'wallet' =>$request->balance
            ]);

            Alert::success(__('dashboard.success'), __('dashboard.update_success'));
            return redirect()->back();

    }



    public function deleteImg($type , $id){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_users'))
        return redirect()->back();
        $user=User::find($id);
        if($type=='passport'){

            $img_path= public_path('uploads/users/passport_img/'.$user->passport_img);
            if(File::exists($img_path))
            File::delete($img_path);
            $user->passport_img=null;
            $user->save();
            return true;

        }elseif($type=='img'){

            $img_path= public_path('uploads/users/imgs/'.$user->img);
            if(File::exists($img_path))
            File::delete($img_path);
            $user->img=null;
            $user->save();
            return true;
        }
    }

}
