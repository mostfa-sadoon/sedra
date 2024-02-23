<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BarcodeTemplate,User,ServicePrice,BankTransfare};
use Auth;
use Alert;


class barcodeController extends Controller
{
    //
    public function index($type){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_barcode'))
        return redirect()->back();

       // $barcodes  = BarcodeTemplate::where('status',$type)->get();
        $price=ServicePrice::where('name','BarCODE')->first()->price;
        return view('admin.barcode.index',compact('type','price'));
    }

    public function list(Request $request,$type){
        $query=BarcodeTemplate::query();
        $order = $request['order'];


        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query
            ->join('users','barcode_templats.user_id','=','users.id')
          //  ->where('barcode_templats.status',$type)
            ->where(function ($query) use ($search,$type) {
                $query->where('users.name', 'like', '%' . $search . '%')
                ->where('barcode_templats.status',$type)
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

        $data = $query->select('barcode_templats.id as id','barcode_templats.created_at','payment_type','barcode_templats.passport','barcode_templats.phone','price','users.name')
        ->where('barcode_templats.status',$type)
        ->get()
        ->map(function ($item) use($type){
            return [
                'id'              =>$item->id,
                'name'            =>$item->name,
                'payment_type'    =>$item->payment_type,
                'passport'        =>$item->passport,
                'phone'           =>$item->phone,
                'price'           =>$item->price,
                'created_at'      =>$item->created_at->format('H:i Y-m-d'),   // Format the date
                'type'            =>$type,
                'status'          =>'',
                'options'         =>''
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
        if(!Auth::guard('web')->user()->hasPermissionTo('accept_barcode'))
        return redirect()->back();

        $barcodes  = BarcodeTemplate::find($id);
        $barcodes->status='accepted';
        $barcodes->save();
        Alert::success(__('dashboard.success'), __('dashboard.request_accept'));
        return redirect()->back();
    }

    public function reject(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('reject_barcode'))
        return redirect()->back();

        $barcode  = BarcodeTemplate::find($request->id);
        $barcode->status='refused';
        $user=User::find($barcode->user_id);
        if($barcode->payment_type!=2){
            $user->wallet+=$barcode->price;
            $user->save();
        }

        $barcode->save();
        Alert::success(__('dashboard.success'), __('dashboard.request_reject'));
        return redirect()->back();
    }

    public function show($id){
        $barcode  = BarcodeTemplate::find($id);
        $banktransfare ='';
        if($barcode->payment_type==2){
            $banktransfare=BankTransfare::select('img')->where(['order_id'=>$barcode->id, 'type' => 'barcode'])->first();
         }

        return view('admin.barcode.detailes',compact('barcode','banktransfare'));
    }

    public function changePrice(Request $request){
        $price=ServicePrice::where('name','BarCODE')->first();
        $price->update([
            'price'=>$request->price
        ]);
        Alert::success(__('dashboard.success'), __('dashboard.change_price'));
        return redirect()->back();
    }

}
