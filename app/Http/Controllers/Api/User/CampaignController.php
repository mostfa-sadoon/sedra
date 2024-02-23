<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Campaign,UserRegiment,Regiment,CompanyReview,Company,CompanyReport
               ,CanceledCampaign,BookingDocs,CompanyNotification,CompanyNotificationTranslation,Setting};
use App\Interfaces\{NotificationRepositoryinterface,CartRepositoryInterface};
use Illuminate\Support\Facades\DB;
use App\Traits\{response,fileTrait,BankTransfareTrait};
use Auth;
use Carbon\Carbon;
use Validator;
use Exception;
use App;

class CampaignController extends Controller
{
    //
    use response,fileTrait,BankTransfareTrait;

    public function __construct(NotificationRepositoryinterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }

     public function get_campaigns(Request $request){
        $campaigns=Campaign::with('company')
        ->whereHas('regiments',function($q)use ($request){
            $q->whereDate('date','>',Carbon::now())
            ->when($request->date!=null,function($q)use($request){
                return $q->whereDate('date','=',$request->date);
            });
        })
        ->where('status',1)
        ->when($request->country_id!=null,function($q)use($request){
           return $q->where('country_id',$request->country_id);
        })
        ->when($request->city_id!=null,function($q)use($request){
            return $q->where('city_id',$request->city_id);
         })

         ->orderBy('distinct', 'desc')
         ->orderBy('created_at','desc')
         ->get();
        $data['campaigns']=$campaigns;
        return $this->response(true,__('response.get_campaigns'),$data);
     }

     public function getDistinctCampaigns(){
        $campaigns=Campaign::with('company')
        ->whereHas('regiments',function($q){
            $q->whereDate('date','>',Carbon::now());

        })
        ->where('status',1)
        ->where('distinct',1)->get();
        $data['campaigns']=$campaigns;
        return $this->response(true,__('response.get_campaign'),$data);

     }


     public function show(Request $request){
        $campaign=Campaign::with(['regiments','company'])->find($request->campaign_id);
        foreach($campaign->regiments as $regiment){
               $regiment->reservation=false;
            if($regiment->date > Carbon::now()){
                $regiment->reservation=true;
            }
        }
        $data['campaign']=$campaign;

        return $this->response(true,'get compaign successfuly',$data);
     }

     public function book(Request $request){
        $user=Auth::guard('user_api')->user();
        $Regiment=Regiment::find($request->regiment_id);

        $campaign=Campaign::find($request->campaign_id);

        if($campaign->available_places==0)
        return $this->response(false,__('response.campaign_completed'),null,422);

        if($Regiment->available_places==0)
        return $this->response(false,__('response.Regiment_completed'),null,422);


        if($request->number > $Regiment->available_places)
        return $this->response(false,__('response.persons_count'),null,422);


        DB::beginTransaction();

           // if user pay by wallet
           if($request->wallet_price!=0){
            if($user->wallet<$request->wallet_price)
            return $this->response(false,__('response.not_enought_money'),null,406);
             $user->update(['wallet'=>$user->wallet-$request->wallet_price]);
            }

        $userregmint= UserRegiment::create([
          'user_id'      =>$user->id,
          'campaign_id'  =>$request->campaign_id,
          'regiment_id'  =>$request->regiment_id,
          'price'        =>$request->price,
          'number'       =>$request->number,
          'type'         =>$request->type,
          'payment_type' =>$request->payment_type,
          'date'         =>$Regiment->date
        ]);
        if($request->docs!=null){
            foreach($request->docs as $document){
                $document=$this->MoveImage($document,'uploads/booking_docs');

                BookingDocs::create([
                    'user_id'      =>$user->id,
                    'campaign_id'  =>$request->campaign_id,
                    'document'     =>$document,
                    'booking_id'   =>$userregmint->id
                ]);
            }
        }

         $campaign->available_places=$campaign->available_places-$request->number;
         $campaign->save();

         $Regiment->available_places=$Regiment->available_places-$request->number;
         $Regiment->save();


         $companynotification=CompanyNotification::create([
            'company_id' =>  $campaign->company_id
        ]);

         $langs=['ar','en'];
         foreach($langs as $lang){
            if($lang=='ar'){
                $title='حجز حمله';
                $body=$user->name .'  قام بحجز حملتك ';
             }else{
                $title='booking campaign';
                $body= $user->name.' booking your campaign';
             }
             CompanyNotificationTranslation::create([
                  'company_notification_id' =>$companynotification->id,
                  'locale'    =>$lang,
                  'title'     =>$title,
                  'body'      =>$body,
             ]);
         }

         $system_rate=Setting::first()->rate;

         $company=Company::find($campaign->company_id);

         // update balance of company
         $company->balance=$company->balance+($request->price*((100-$system_rate)/100));
         $company->net_profit=$company->net_profit+($request->price*((100-$system_rate)/100));
         $company->total_sales=$company->total_sales+($request->price);
         $company->save();

         if($company->lang=='ar'){
            $title='حجز حمله';
            $body=$user->name .'  قام بحجز حملتك ';
         }else{
            $title='booking campaign';
            $body= $user->name.' booking your campaign';
         }
         $this->NotificationRepository->sendnotification('company',$company->id,$title,$body);



         $data['id']=$userregmint->id;



         if($request->transfare_img!=null && $request->bank_id!=null){
            $img=$this->MoveImage($request->transfare_img,'uploads/users/banktransfare');+
            $this->bankTransfare($request->bank_id,$img,'booking',$userregmint->id,$user,$request->price);
         }

         DB::commit();
        return $this->response(true,__('response.book_sucssefuly'),$data);
     }


     public function filtercampign(Request $request){
        $price=$request->price;
        $rate=$request->rate;
        $city_id=$request->city_id;
        $minPrice=$request->minPrice;
        $maxPrice=$request->maxPrice;

        $campaigns=Campaign::with('company')->where('status',1)
        ->where('country_id',$request->country_id)

        ->when($city_id!=null,function($q)use($city_id){
            return $q->where('city_id',$city_id);
        })

        ->when($minPrice!=null,function($q)use($minPrice){
            return $q->where('single_price','>=',$minPrice);
        })

        ->when($maxPrice!=null,function($q)use($maxPrice){
            return $q->where('single_price','<=',$maxPrice);
        })


        ->when($rate!=null,function($q)use ($rate){
            return $q->whereHas('company',function($q) use($rate) {
                $q->where("rate",'>=',$rate);
            });
        })
        ->orderBy('distinct', 'desc')
        ->orderBy('created_at', 'desc')
        ->get();

        $data['campaigns']=$campaigns;
        return $this->response(true,__('response.get_campaigns'),$data);

     }


     // get current campaign
     public function get_my_comapigns(Request $request){
        $user=Auth::guard('user_api')->user();

        $userRegiments=UserRegiment::with('campaign.company')->where("user_id",$user->id)
        ->whereHas('regiment',function($q){
            $q->whereDate('date','>',Carbon::now());

        })
        ->active()->get();
        $data['bookings']=$userRegiments;
        return $this->response(true,__('response.get_campaign'),$data);
     }


     public function show_my_campaign(Request $request){

       // dd($request->all());

        $user=Auth::guard('user_api')->user();

        $currentDate = Carbon::now()->toDateString();


        $UserRegiment=UserRegiment::withTrashed()->find($request->booking_id);
     //   dd($UserRegiment);

        $UserRegiment->cancelation=true;

        $campaign=Campaign::with(['regiments'=>function($q)use($UserRegiment){
             $q->where('id',$UserRegiment->regiment_id)->get();
        },'company','campaignOfficial'])->find($UserRegiment->campaign_id);

        $document= BookingDocs::where(['user_id'=>$user->id ,'booking_id'=>$UserRegiment->id ])->get();

        // check if user make review for this campaign or not
        $makereview=true;
        $CompanyReview=CompanyReview::where(['user_id'=>$user->id,'campaign_id'=>$UserRegiment->campaign_id])->first();
        if($CompanyReview!=null)
        $makereview=false;

        $campaign->makereview=$makereview;
         $regiments=[];
        //  select regiment
        foreach($campaign->regiments as $key=>$regiment){
              $regiment->selected=false;

              if($regiment->id==$UserRegiment->regiment_id){
                    $regiment->selected=true;
                    // check if user can cancel his booking by check the avilable date of cancelation in his regiment
                    if($regiment->cancellation_date <=  $currentDate)
                     $UserRegiment->cancelation=false;
              }

        }




        $data['campaign']=$campaign;
        $data['UserRegiment']=$UserRegiment;
        $data['documents']=$document;




        return $this->response(true,__('response.get_campaign'),$data);
     }


     public function review_company(Request $request){


        $validator =Validator::make($request->all(), [

            'rate'         =>'required',
            'company_id'   =>'required',
            'campaign_id'  =>'required',

        ]);

        if ($validator->fails()) {
                return response()->json([
                    'message'=>$validator->messages()->first()
                ],403);
        }

       try {
            $user=Auth::guard('user_api')->user();

            $CompanyReview=CompanyReview::where(['user_id'=>$user->id,'campaign_id'=>$request->campaign_id])->first();
            if($CompanyReview!=null)
            return $this->response(false,__('response.already_review'),null,419);

            CompanyReview::create([
               'rate'          =>$request->rate,
               'review'        =>$request->review,
               'company_id'    =>$request->company_id,
               'user_id'       =>$user->id,
               'campaign_id'   =>$request->campaign_id
            ]);
            $company=Company::find($request->company_id);
             // number of reviews
            $CompanyReviewcount=CompanyReview::where('company_id',$request->company_id)->count();


            $total_rate=$company->total_rate+$request->rate;
            $company->total_rate=$total_rate;
            $company->ratings_count=$company->ratings_count+1;
            $company->save();
             // rate of company
            $rate= $total_rate/$CompanyReviewcount;

            $company->rate=$rate;
            $company->save();


            return $this->response(true,__('response.make_review'));
        }catch(\Exception $ex){
             return $this->response(false,__('response.wrong'),null,419);
        }
     }

     public function get_company_reviews(Request $request){

        $company_id=$request->company_id;

        $reviews=CompanyReview::with(['user'=>function($q){
         $q->select('name','id')->get();
        },'company'=>function($q){
            $q->select('name','id','logo','rate')->get();
        }])->where('company_id',$company_id)->get();

        $data['reviews']=$reviews;

        return $this->response(true,__('response.get_reviews'),$data);
     }


     public function create_report(Request $request){

        try{
            DB::beginTransaction();

            $user=Auth::guard('user_api')->user();
            $company_id=$request->company_id;
            CompanyReport::create([
               'user_id'      =>$user->id,
               'company_id'   =>$company_id,
               'report'       =>$request->report
            ]);
            DB::commit();
            return $this->response(true,__('response.success'));
        }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);
        }

     }


     public function cancel(Request $request){
        $validator =Validator::make($request->all(), [
            'regiment_id'  =>'required',
        ]);

        if ($validator->fails()) {
                return response()->json([
                    'message'=>$validator->messages()->first()
                ],403);
        }
      try{
            DB::beginTransaction();

            $user=Auth::guard('user_api')->user();
            $UserRegiment=UserRegiment::where(['user_id'=>$user->id,'regiment_id'=>$request->regiment_id])->first();
            if($UserRegiment==null)
            return $this->response(false,'not difined',null,404);
            $regmint=Regiment::find($request->regiment_id);
            if(Carbon::now()->format('Y-m-d')>$regmint->cancellation_date)
            return $this->response(false,__('response.expire_time'),null,406);

            if($UserRegiment->payment_type!=2){
              $user->wallet=$user->wallet+$UserRegiment->price;
              $user->save();
              }

            $regmint->available_places=$regmint->available_places+$UserRegiment->number;
            $regmint->save();
            $campaign=Campaign::find($UserRegiment->campaign_id);
            $campaign->available_places=$campaign->available_places+$UserRegiment->number;
            $campaign->save();
            $UserRegiment->delete();


            $companynotification=CompanyNotification::create([
                'company_id' =>  $campaign->company_id
            ]);

            $langs=['ar','en'];
            foreach($langs as $lang){
               if($lang=='ar'){
                   $title='الغاء حمله';
                   $body=$user->name .'  قام بالغاء حملتك ';
                }else{
                   $title='cancel campaign';
                   $body= $user->name.' canceled your campaign';
                }
                CompanyNotificationTranslation::create([
                     'company_notification_id' =>$companynotification->id,
                     'locale'    =>$lang,
                     'title'     =>$title,
                     'body'      =>$body,
                ]);
            }



            $company=Company::find($campaign->company_id);
            if($company->lang=='ar'){
                $title='الغاء حمله';
                $body=$user->name .'  قام بالغاء حملتك ';
            }else{
                   $title ='cancel campaign';
                   $body  = $user->name.' canceled your campaign';
            }
            $this->NotificationRepository->sendnotification('company',$company->id,$title,$body);

            DB::commit();
            return $this->response(true,__('response.success'));
         }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);
         }

     }


     public function getCanceledCampaign(Request $request){
          $user=Auth::guard('user_api')->user();
          $userRegiments=UserRegiment::with('campaign.company')->where("user_id",$user->id)->onlyTrashed()->active()->get();
          $data['bookings']=$userRegiments;
          return $this->response(true,__('response.success'),$data);
     }

     public function getPreviousCampaign(Request $request){
        $user=Auth::guard('user_api')->user();
        $userRegiments=UserRegiment::with(['campaign.company'])->where("user_id",$user->id)

        ->whereHas('regiment',function($q){
            $q->whereDate('date','<',Carbon::now());

        })
        ->active()->get();

        $data['bookings']=$userRegiments;
        return $this->response(true,__('response.success'),$data);
    }

}
