<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Regiment,UserRegiment,User,Campaign,Company,Setting};
use Illuminate\Support\Facades\DB;
use Auth;


class RegmintController extends Controller
{
    //

    public function show($id){

        $regmint=Regiment::with(['booking'=>function($q){
            $q->paginate(5);
        },'campaign'])->find($id);
        return view('admin.regmints.show',compact('regmint'));
    }


    public function cancelBooking(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('cancel_booking'))
        return redirect()->back();
        try{
            DB::beginTransaction();
               $id=$request->id;
               $userregmint=UserRegiment::with('campaign')->find($id);


                $user=User::find($userregmint->user_id);
                $company=Company::find($userregmint->campaign->company_id);


                $user->update([
                    'wallet'=>$user->wallet+ $userregmint->price
                ]);

                $system_rate=Setting::first()->rate;

                $company->balance=$company->balance-($userregmint->price*((100-$system_rate)/100));
                $company->net_profit=$company->net_profit-($userregmint->price*((100-$system_rate)/100));
                $company->total_sales=$company->total_sales+($userregmint->price);
                $company->save();


            $userregmint->delete();
            DB::commit();

         return redirect()->back();
        }catch(\Exception $ex){
                return redirect()->back();
        }
    }

    public function edit($id){
        $regmint=Regiment::find($id);

        return view('admin.regmints.edit',compact('regmint'));
    }

    public function Update(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_regmints'))
        return redirect()->back();

        $regmint=Regiment::find($request->id);

        $regmints=Regiment::where('campaign_id',$regmint->campaign_id)
        ->where('id','!=',$regmint->id)->get();

          $campaign= Campaign::find($regmint->campaign_id);

        $personscount=$request->persons_count;
        foreach($regmints as $regmintcount){
           $personscount+=$regmintcount->persons_count;
        }

        if($personscount > $campaign->persons_count)
        return redirect()->back()->with('error', 'you skip the limit of perons in campaign');

        $regmint->update([
             'date'                    =>$request->date,
             'days_count'              =>$request->days_count,
             'persons_count'           =>$request->persons_count,
             'cancellation_date'       =>$request->cancellation_date
        ]);


        return redirect()->back();
    }

    public function getDetailes($id){

       $regmint=  Regiment::with('campaign.company')->find($id);
       return view('admin.regmints.detailes',compact('regmint'));

    }

}
