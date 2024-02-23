<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletLog;
use App\Traits\{response,fileTrait,BankTransfareTrait};
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class WalletController extends Controller
{
    //
    use response,BankTransfareTrait,fileTrait;
    public function get_wallet(){
        $user=Auth::guard('user_api')->user();
        $data['wallet']=$user->wallet;
        return $this->response(true,__('response.success'),$data);
    }


    public function charge_wallet(Request $request){

        $validator =Validator::make($request->all(), [
            'amount'         =>'required',
        ]);

        if ($validator->fails()) {
                return response()->json([
                    'message'=>$validator->messages()->first()
                ],403);
        }



        // try{

            DB::beginTransaction();
            $user=Auth::guard('user_api')->user();

                $status='Deposit';
                if($request->payment_type==2)
                $status='Deposit_request';

              $wallet= WalletLog::create([
                'user_id' =>$user->id,
                'amount'  =>$request->amount,
                'fort_id' =>$request->fort_id,
                'status'  =>$status
              ]);

              $data['id']=$wallet->id;


              if($request->payment_type==2){

                if($request->transfare_img!=null && $request->bank_id!=null){
                    $img=$this->MoveImage($request->transfare_img,'uploads/users/banktransfare');+
                    $this->bankTransfare($request->bank_id,$img,'wallet',$wallet->id,$user,$request->amount);
                 }


                 DB::commit();

                 return $this->response(true,__('response.request_review'),$data);
              }




            $user->wallet=$user->wallet+$request->amount;
            $user->save();

            DB::commit();



            return $this->response(true,__('response.success'),$data);
        // }catch(\Exception $ex){
        //     return $this->response(false,__('response.wrong'),null,419);
        // }

    }


}
