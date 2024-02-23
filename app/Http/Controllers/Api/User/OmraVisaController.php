<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{OmraVisa,ServicePrice};
use App\Http\Requests\OmraVisa as OmraVisaRequest;

use App\Traits\{response,fileTrait,BankTransfareTrait};
use Auth;



class OmraVisaController extends Controller
{
    //
    use response,fileTrait,BankTransfareTrait;
    public function store(OmraVisaRequest $request){
        $user=Auth::guard('user_api')->user();
        $personal_img=$this->MoveImage($request->personal_img ,'uploads/users/omra/personal');
        $passport_img=$this->MoveImage($request->passport_img,'uploads/users/omra');

        // if user pay by wallet
        if($request->wallet_price!=0){
            if($user->wallet<$request->wallet_price)
            return $this->response(false,'you have not enought mony',null,406);
            $user->update(['wallet'=>$user->wallet-$request->wallet_price]);
        }
            $price=ServicePrice::where('name','OmraVisa')->first()->price;
        $omra=  OmraVisa::create([
           'user_id'        =>$user->id,
           'personal_img'   =>$personal_img,
           'passport_img'   =>$passport_img,
           'payment_type'   =>$request->payment_type,
           'price'          =>$price,
           'fort_id'        =>$request->fort_id
        ]);
         $data['id']=$omra->id;

         if($request->transfare_img!=null && $request->bank_id!=null){
            $img=$this->MoveImage($request->transfare_img,'uploads/users/banktransfare');+
            $this->bankTransfare($request->bank_id,$img,'omra',$omra->id,$user,$price);
         }


        return $this->response(true,__('response.success'),$data);
    }


    public function getOmraVisa(){
        $user=Auth::guard('user_api')->user();
        $OmraVisa=OmraVisa::where('user_id',$user->id)->orderby('created_at','desc')->get();
        foreach($OmraVisa as $item){
            if($item->status=='accepted'){
                $status=__('dashboard.accepted');
               }else{
                $status=__('dashboard.pending');
               }
               $item->status=$status;
        }
        $data['OmraVisa']=$OmraVisa;
        return $this->response(true,__('response.get_data'),$data);
    }

    public function getOmraPrice(){
        $price=ServicePrice::where('name','OmraVisa')->first();
        $data['price']=$price->price;
        return $this->response(true,__('response.success'),$data);
    }
}
