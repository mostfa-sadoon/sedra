<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;
use Alert;
use Illuminate\Validation\Rule;
use Auth;

class PromocodeController extends Controller
{
    //
    public function index(){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_promocode'))
        return redirect()->back();

        $promocodes=PromoCode::get();
        return view('admin.promocode.index',compact('promocodes'));
    }

    public function store(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('store_promocode'))
        return redirect()->back();

        $request->validate([
           'code'  =>'unique:promocodes'
        ]);
        PromoCode::create([
            'users_number' =>$request->users_number,
            'code' =>$request->code,
            'amount' =>$request->amount,
            'percent' =>$request->percent,
            'start_date' =>$request->start_date,
            'enddate' =>$request->end_date,
            'min_order_price' =>$request->min_order_price,

        ]);
        Alert::success(__('dashboard.success'), __('dashboard.promo_code_added'));
        return redirect()->back();
    }



    public function update(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_promocode'))
        return redirect()->back();

        $rules = [
            'code' => [
                'required',
                Rule::unique('promocodes', 'code')->ignore($request->id),
            ],
        ];
        $promocode = PromoCode::find($request->id);

        $promocode->update([
           "code"            =>$request->code,
           "users_number"    =>$request->users_number,
           "amount"          =>$request->amount,
           "percent"         =>$request->percent,
           "start_date"      =>$request->start_date,
           "enddate"        =>$request->end_date,
           "min_order_price" =>$request->min_order_price,
        ]);
        Alert::success(__('dashboard.success'), __('dashboard.update_success'));
        return redirect()->back();
    }



    public function delete(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('delete_promocode'))
        return redirect()->back();

        $promocode = PromoCode::find($request->id);
        $promocode->delete();

        Alert::success(__('dashboard.success'), __('dashboard.delete_success'));

        return redirect()->back();
    }
}
