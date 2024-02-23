<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Alert;

class SettingController extends Controller
{
    //
    public function general(){
        $setting=Setting::first();
        return view('admin.setting.general',compact('setting'));
    }

    public function aboutUpdate(Request $request){
        
        try{
            DB::beginTransaction();

            $setting=Setting::first();

            foreach (config('translatable.locales') as $locale) {
                $setting->translateOrNew($locale)->about_us = $request->input($locale.'.desc');

              }
              $setting->save();

            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }


    }
    public function policeyUpdate(Request $request){
        try{
            DB::beginTransaction();

            $setting=Setting::first();

            foreach (config('translatable.locales') as $locale) {
                $setting->translateOrNew($locale)->policy = $request->input($locale.'.desc');

              }
              $setting->save();

            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }
    public function termsUpdate(Request $request){
        try{
            DB::beginTransaction();

            $setting=Setting::first();

            foreach (config('translatable.locales') as $locale) {
                $setting->translateOrNew($locale)->terms = $request->input($locale.'.desc');

              }
              $setting->save();

            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }
    public function contactUpdate(Request $request){
        
        try{
            DB::beginTransaction();

            $setting=Setting::first();
             
            $setting->phone_contact=$request->phone;
            $setting->country_code=$request->country_code;
            $setting->email_contact=$request->email_contact;
            
            $setting->save();

            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }


    public function campaign(){
        $setting=Setting::first();
        return view('admin.setting.campaign',compact('setting'));
    }
    public function updateCampaign(Request $request){
        try{
            DB::beginTransaction();

            $setting=Setting::first();
             
            $setting->rate=$request->rate;
         
            
            $setting->save();

            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }

    }
}
