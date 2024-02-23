<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\companyapi\companyregister;
use App\Interfaces\{NotificationRepositoryinterface,CartRepositoryInterface};
use App\Models\{Company,CompanyBankAccount,Campaign};
use Illuminate\Support\Facades\DB;
use App\Traits\{response,fileTrait};
use Carbon\Carbon;
use Validator;
use Auth;

class AuthController extends Controller
{
    //
    use response,fileTrait;

    private NotificationRepositoryinterface $NotificationRepository;
    public function __construct(
        NotificationRepositoryinterface $NotificationRepository,
        CartRepositoryInterface         $cartRepository
      )
    {
        $this->NotificationRepository = $NotificationRepository;
        $this->cartRepository         = $cartRepository;
    }

    public function register(companyregister $request){
       $logo=$this->MoveImage($request->logo,'uploads/companies/logo');
       $lang=$request->header('lang');
       $company=Company::create([
             'name'           =>$request->name,
             'email'          =>$request->email,
             'phone'          =>$request->phone,
             'country_code'   =>$request->country_code,
             'logo'           =>$logo,
             'password'       =>$request->password,
             'lang'           =>$lang
        ]);
        foreach($request->bank_name as $key=>$bank){
            $CompanyBankAccount=CompanyBankAccount::create([
                'name'              =>$bank,
                'account_number'    =>$request->account_number[$key],
                'company_id'        =>$company->id
            ]);
        }

        // $token=auth('company_api')->login($company);
        // $data['token']=$token;

        return $this->response(true,__('response.wait_for_activation'));
    }

    public function login(Request $request){
        $credentials = request(['phone','password']);

        if (!$token = auth()->guard('company_api')->attempt($credentials)) {
            return response()->json(['message' => __('response.login_error')], 401);
        }

        $company=Auth::guard('company_api')->user();
        if($company->delete_account==true)
        return response()->json(['status'=>false,'message'=>__('response.account_not_avilable')],401);

        if($company->status==false)
        return response()->json(['status'=>false,'message'=>__('response.account_dissabled')],401);

        $data['token']=$token;
        return $this->response(true,__('response.login'),$data);
    }

    public function checkphone(Request $request){
        $validator =Validator::make($request->all(), [
            'phone'       =>'required',
            'country_code'  =>'required'
          ]);
          if ($validator->fails()) {
           return response()->json([
               'message'=>$validator->messages()->first()
           ],403);
           }
           $company=Company::where('phone',$request->phone,'country_id',$request->country_id)->first();
           if($company==null)
           return $this->response(false ,'this phone not avilable',null,409);

           //here create otp
            $otp=1234;
           // here snd sms

           $company->update([
              'otp'=>$otp
           ]);

           return $this->response(true,'check your phone and send otp');
    }

    public function sendotp(Request $request){
        $validator =Validator::make($request->all(), [
            'otp'                   =>'required',
            'phone'              => 'required',
          ]);
          if ($validator->fails()) {
           return response()->json([
               'message'=>$validator->messages()->first()
           ],403);
           }
          $company=company::where('phone',$request->phone)->where('otp',$request->otp)->first();
          if($company==null)
          return $this->response(false,'otp is uncorrect',null,405);

          return $this->response(true,'go to next request');
    }

    public function updatepassword(Request $request){
        $validator =Validator::make($request->all(), [

            'password'              => 'required|min:6|max:50|confirmed',
            'password_confirmation' => 'required|max:50|min:6',
          ]);
          if ($validator->fails()) {
           return response()->json([
               'message'=>$validator->messages()->first()
           ],403);
           }

           $company=company::where('phone',$request->phone)->first();
           if($company==null)
           return $this->response(false,'otp is uncorrect',null,405);

           $company->update([
              'password'=>$request->password
           ]);

           return $this->response(true,'password updated sucessfuly');

    }

    public function logout(Request $request){
        $id=Auth::guard('company_api')->user()->id;
        $this->NotificationRepository->delete_device_token('company',$request->device_token,$id);
        Auth::guard('company_api')->logout();
        return response()->json([
            'status' => true,
            'message'=>'logout success',
        ]);
    }

    public function deleteAccount(Request $request){
        DB::beginTransaction();
        $company=Auth::guard('company_api')->user();

        // first check if this company have campaign or not
        // if this company havn't campaign we will delete it immediately
        $Campigns=Campaign::where('company_id',$company->id)
        ->whereHas('regiments',function($q){
            $q->whereDate('date','>',Carbon::now());
        })
        ->get();
        if($Campigns->isEmpty()){
            $company->update([
               'delete_account'=>true,
               'phone'         =>null,
               'name'         =>$company->name.'.',
               'email'        =>null,
            ]);
            $CompanyBankAccounts= CompanyBankAccount::where('company_id',$company->id)->get();
            foreach($CompanyBankAccounts as $bankaccount){
                $bankaccount->delete();
            }

            $this->logout($request);

            DB::commit();
            return response()->json([
                'status' => true,
                'message'=>'Account deleted success',
            ]);
        }
        DB::commit();
        return response()->json([
            'status' => true,
            'message'=>'You already have avilable campign please cancel it first',
        ]);

    }

}
