<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Company\{AuthController,CampainController,ProfileController,SettingController,NotificationController};
use App\Http\Controllers\CountryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['lang'])->group(function(){
    Route::controller(AuthController::class)->group(function(){  //
        Route::Post('register','register');
        Route::post('login','login');
        Route::post('checkphone','checkphone');
        Route::post('sendotp','sendotp');
        Route::post('newpassword','updatepassword');
     });

    Route::controller(CountryController::class)->group(function(){
       Route::get('getcountries','getcountries');
       Route::get('getcities/{country_id?}','getcities');
       Route::get('getprograms','getprograms');
    });

    Route::controller(SettingController::class)->group(function(){
        Route::get('get/about_us','get_aboutus');  //
        Route::get('get/terms','get_terms');
        Route::get('get/policy','get_policy');

    });

    Route::controller(ProfileController::class)->group(function(){

        Route::get('get/contact','contactus');

    });

    Route::middleware('CompanyAuthApi','deletAccount','checkActive')->group(function(){



        Route::controller(AuthController::class)->group(function(){  //
            Route::post('logout','logout');
            Route::post('delete/account','deleteAccount');

        });

        Route::controller(CampainController::class)->group(function(){
            Route::Post('store/campaign','store');
            Route::get('get/compaines','get_compaines');
            Route::get('get/booking/users/{campaign_id?}','booking_users');

            Route::post('delete/campaign','delete');
            Route::post('cancel/campaign','cancel');

            Route::get('booking/detailes/{bookingId?}','bookingDetailes');


        });

        Route::controller(ProfileController::class)->group(function(){
            Route::get('get/profile','getprofile');
            Route::post('change/password','changepassword');
            Route::post('update/profile','updateprofile');

            Route::get('get/reviews','get_reviews');
            Route::get('get/sales','getSales');

        });

       Route::controller(SettingController::class)->group(function(){
          Route::get('/update/lang','update_lang');
          Route::post('update/notify','update_notify');

       });


       Route::controller(NotificationController::class)->group(function(){
            Route::Post('/create/token','create_device_token');
            Route::get('get/notification','getNotifications');

       });


    });
});

