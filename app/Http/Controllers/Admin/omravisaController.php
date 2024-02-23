<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{OmraVisa,User,ServicePrice,BankTransfare};
use Alert;
use Auth;

class omravisaController extends Controller
{
    //
    public function index($type){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_omravisa'))
        return redirect()->back();
        $price=ServicePrice::where('name','OmraVisa')->first()->price;
        return view('admin.omravisa.index',compact('type','price'));
    }

    public function list(Request $request,$type){
        $query=OmraVisa::query();
        $order = $request['order'];


        // Handle searching/filtering

        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query
            ->join('users','omra_visas.user_id','=','users.id')
          //  ->where('barcode_templats.status',$type)
            ->where(function ($query) use ($search,$type) {
                $query->where('users.name', 'like', '%' . $search . '%')
                ->where('omra_visas.status',$type)
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

        $data = $query
        ->select('omra_visas.id as id','omra_visas.payment_type','users.name','omra_visas.passport_img','omra_visas.personal_img','omra_visas.price','omra_visas.created_at')
        ->where('omra_visas.status',$type)
        ->get()
        ->map(function ($item) use($type){
            return [
                'id'               =>$item->id,
                'name'             =>$item->name,
                'passport_img'     =>$item->passport_img,
                'personal_img'     =>$item->personal_img,
                'price'            =>$item->price,
                'payment_type'      =>$item->payment_type,
                'created_at'       =>$item->created_at->format(' H:i Y-m-d'),   // Format the date
                'type'             =>$type,
                'status'           =>'',
                'options'          =>''
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);
    }

    public function accept($id){
        if(!Auth::guard('web')->user()->hasPermissionTo('accept_omravisa'))
        return redirect()->back();

        $omravisa  = OmraVisa::find($id);
        $omravisa->status='accepted';
        $omravisa->save();
        Alert::success(__('dashboard.success'), __('dashboard.request_accept'));

        return redirect()->back();
    }

    public function reject(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('reject_omravisa'))
        return redirect()->back();

        $omravisa  = OmraVisa::find($request->id);
        $omravisa->status='refused';

        $user=User::find($omravisa->user_id);


        if($omravisa->payment_type!=2){
            $user->wallet+=$omravisa->price;
            $user->save();
        }


        $omravisa->save();
        Alert::success(__('dashboard.success'), __('dashboard.request_reject'));

        return redirect()->back();
    }

    public function show($id){
        $omravisa  = OmraVisa::find($id);
        $banktransfare ='';
        if($omravisa->payment_type==2){
            $banktransfare=BankTransfare::select('Img')->where(['order_id'=>$omravisa->id, 'type' => 'omra'])->first();
         }
        return view('admin.omravisa.detailes',compact('omravisa','banktransfare'));
    }

    public function changePrice(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_omravisa'))
        return redirect()->back();
        $price=ServicePrice::where('name','OmraVisa')->first();
        $price->update([
            'price'=>$request->price
        ]);
        Alert::success(__('dashboard.success'), __('dashboard.change_price'));
        return redirect()->back();
    }
}
