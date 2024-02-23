<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BarcodeTemplate,ServicePrice};
use App\Http\Requests\barcodetemplate as barcodetemplateRequest;
use App\Traits\{response,fileTrait,BankTransfareTrait};
use Auth;

class BarcodeController extends Controller
{
    //
    use response,fileTrait,BankTransfareTrait;
    public function store(barcodetemplateRequest $request){
        $user=Auth::guard('user_api')->user();
        $passport_img=$this->MoveImage($request->passport_img,'uploads/users/qrcode');
         // if user pay by wallet
         if($request->wallet_price!=0){
            if($user->wallet<$request->wallet_price)
            return $this->response(false,__('response.not_enought_money'),null,406);
             $user->update(['wallet'=>$user->wallet-$request->wallet_price]);
            }
        $price=ServicePrice::where('name','BarCODE')->first()->price;
        $barcode= BarcodeTemplate::create([
          'user_id'           =>$user->id,
          'passport_img'      =>$passport_img,
          'passport'          =>$request->passport,
          'name'              =>$request->name,
          'phone'             =>$request->phone,
          'country_code'      =>$request->country_code,
          'payment_type'      =>$request->payment_type,
          'price'             =>$price,
          'fort_id'                  =>$request->fort_id

        ]);
        $data['id']=$barcode->id;

        if($request->transfare_img!=null && $request->bank_id!=null){
            $img=$this->MoveImage($request->transfare_img,'uploads/users/banktransfare');+
            $this->bankTransfare($request->bank_id,$img,'barcode',$barcode->id,$user,$price);
         }

        return $this->response(true,__('response.add_qrcode'),$data);
    }
    public function getBarCode(){
        $user=Auth::guard('user_api')->user();
        $BarcodeTemplate=BarcodeTemplate::where('user_id',$user->id)->orderby('created_at','desc')->get()->map(function($item){
           if($item->status=='accepted'){
            $status=__('dashboard.accepted');
           }else{
            $status=__('dashboard.pending');
           }
           return [
              'id' =>$item->id,
              'name' =>$item->name,
              'phone' =>$item->phone,
              'country_code' =>$item->country_code,
              'passport' =>$item->passport,
              'passport_img' =>$item->passport_img,
              'user_id' =>$item->user_id,
              'status' =>$status,
              'payment_type' =>$item->payment_type,
              'created_at' =>$item->created_at,
              'price' =>$item->price,
           ];
        });

        $data['BarcodeTemplate']=$BarcodeTemplate;
        return $this->response(true,__('response.get_data'),$data);
    }

    public function getBarcodePrice(){
           $price=ServicePrice::where('name','BarCODE')->first();
           $data['price']=$price->price;
           return $this->response(true,'get price',$data);
    }
}
