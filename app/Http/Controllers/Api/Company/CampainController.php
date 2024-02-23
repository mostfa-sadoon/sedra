<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\companyapi\CompaignStore;
use App\Models\{Campaign,Regiment,CampaignTranslation,CampaignOfficial,UserRegiment,BookingDocs};
use App\Traits\{response,fileTrait};
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;
class CampainController extends Controller
{
    //
    use  fileTrait,response;
    public function store(CompaignStore $request){

       //  validation
       try{
       if(count($request->regiment_days)!==count($request->regiment_dates)||count($request->regiment_dates)!=count($request->regiment_counts))
       return $this->response(false,'regmints array count not identical',null,422);

       $personscount=0;
       foreach($request->regiment_counts as $count){
          $personscount+=(int)$count;
       }

       if($personscount>(int)$request->persons_count)
       return $this->response(false,__('response.persons_count'),null,422);
       // end validation

       DB::beginTransaction();



       $img=$this->MoveImage($request->img,'uploads/companies/campaigns');
       $company=Auth::guard('company_api')->user();

       $compaign=Campaign::create([
          'program'           =>$request->program,
          'img'               =>$img,
          'single_price'      =>$request->single_price,
          'double_price'      =>$request->double_price,
          'country_id'        =>$request->country_id,
          'city_id'           =>$request->city_id,
          'persons_count'     =>$request->persons_count,
          'available_places'  =>$request->persons_count,
          'company_id'        =>$company->id,
          'lat'               =>$request->lat,
          'lng'               =>$request->lng
       ]);

       CampaignTranslation::insert([
        [
            'name'        =>   $request->name_ar,
            'description' =>   $request->description_ar,
            'campaign_id' =>   $compaign->id,
            'locale'      =>   'ar'
        ],
        [
            'name'        =>   $request->name_en,
            'description' =>   $request->description_en,
            'campaign_id' =>$compaign->id,
            'locale'      =>   'en'
        ],
        ]);

        CampaignOfficial::create([
             'name'            =>$request->admin_name,
             'phone'           =>$request->admin_phone,
             'campaign_id'     =>$compaign->id,
             'country_code'      =>$request->admin_country_code,
            ]);

       foreach($request->regiment_days as $key=>$day){
            Regiment::create([
                'days_count'         =>$day,
                'campaign_id'        =>$compaign->id,
                'date'               =>$request->regiment_dates[$key],
                'persons_count'      =>$request->regiment_counts[$key],
                'available_places'   =>$request->regiment_counts[$key],
                'cancellation_date'  =>$request->cancellation_date[$key]
            ]);
       }
         DB::commit();

       return $this->response(true,'add copagin successfuly');


        }catch(\Exception $ex){
          return $this->response(false,__('response.wrong'),null,419);
        }

    }

    public function get_compaines(Request $request){
        $company=Auth::guard('company_api')->user();
        $campaigns=Campaign::with('company')->where('company_id',$company->id)->get();
        $data['campaigns']=$campaigns;
        return $this->response(true,'get data success',$data);
    }


    public function booking_users(Request $request){
      $Regiments =  Regiment::with('booking.user')->where('campaign_id',$request->campaign_id)->get();
      $data['Regiments']=$Regiments;
      return $this->response(true,'get user booking successfuly',$data);
    }


    public function bookingDetailes(Request $request){

         $userRegiment = UserRegiment::with('regiment')->find($request->bookingId);
         $bookingDocs = BookingDocs::where(['campaign_id'=>$userRegiment->campaign_id  ,'user_id'=>$userRegiment->user_id ])->get();
         $data['number']=$userRegiment->number;
         $data['price']=$userRegiment->price;
         $data['type']=$userRegiment->type;
         $data['date']=$userRegiment->regiment->date;
         $data['days_count']=$userRegiment->regiment->days_count;
         $data['bookingDocs']=$bookingDocs;
         return $this->response(true,'return detailes success',$data);

    }


    public function cancel(Request $request){

        $validator =Validator::make($request->all(), [
            'campaign_id'         =>'required',
        ]);
        if ($validator->fails()) {
                return response()->json([
                    'message'=>$validator->messages()->first()
                ],403);
        }

      try{
        DB::beginTransaction();
        $UserRegiment=UserRegiment::where('campaign_id',$request->campaign_id)->first();
        $Campaign=Campaign::find($request->campaign_id);
        if($UserRegiment==null){
             // soft delete
            $Campaign->delete();
            DB::commit();
        }else{
            $Campaign->update([
                'pending_request'  => 2
             ]);
             DB::commit();
            return $this->response(true,__('response.Admin_check'));
        }

        return $this->response(true,__('response.success'));
        }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);
        }
    }

    public function delete(Request $request){
        $validator =Validator::make($request->all(), [
            'campaign_id'         =>'required',
        ]);
        if ($validator->fails()) {
                return response()->json([
                    'message'=>$validator->messages()->first()
                ],403);
        }

      try{
        DB::beginTransaction();
        $UserRegiment=UserRegiment::where('campaign_id',$request->campaign_id)->first();
        $Campaign=Campaign::find($request->campaign_id);
        if($UserRegiment==null){
            $Campaign->forceDelete();
        }else{
            $Campaign->update([
               'pending_request'  => 1
            ]);
            DB::commit();
            return $this->response(true,__('response.Admin_check'));
        }
        DB::commit();
        return $this->response(true,__('response.success'));
        }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);
        }
    }

}
