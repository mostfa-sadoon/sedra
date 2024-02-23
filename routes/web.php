<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\{HomeController,UserController,AuthController,ProductController
    ,OrderController,CompanyController,CampignController,RegmintController,barcodeController
    ,omravisaController,PromocodeController,EmployeeController,PermissionController,CountryController,SettingController,BankCountroller};

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return 'optimize clear success';
});
Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){


    Route::controller(AuthController::class)->group(function(){
        Route::get('/login','index')->name('Admin.login.index');
        Route::post('/login/submit','login')->name('Admin.login.submit');

    });


    Route::get('/',function(){
        return view('index');
    })->name('Admin.home');


    Route::middleware(['auth'])->group(function () {

        Route::controller(AuthController::class)->group(function(){
            Route::post('/logout','logout')->name('admin.logout');
            Route::get('profile','profile')->name('Admin.profile');   //
            Route::post('profile/update','update')->name('Admin.profile.update');

            Route::post('profile/update/password','updatePassword')->name('Admin.update.password');
        });

        Route::controller(HomeController::class)->group(function(){
            Route::get('/admin/login','index')->name('Admin.home');
        });
        Route::controller(UserController::class)->group(function(){   //
            Route::get('/users','index')->name('Admin.users');
            Route::get('/users/show/{id}','show')->name('Admin.user.show');
            Route::get('getInfo/{id}','getInfo')->name('Admin.user.info');
            Route::Post('/updateInfo','updateInfo')->name('Admin.user.updateinfo');
            Route::get('/user/regmint/detailes/{id}','getRegmintDetailes')->name('Admin.userregmint.detailes');

            Route::post('/user/update/wallet','updateWallet')->name('User.Update.wallet');

            Route::post('/user/delete/','delete')->name('Admin.user.delete');
            Route::get('list/users','list')->name('Admin.user.list');

            Route::get('/delete/img/{type}/{id}','deleteImg');

           // Route::get()
        });

        Route::controller(CompanyController::class)->prefix('companies')->group(function(){
            Route::get('/{type}','index')->name('Admin.companies');
            Route::get('/show/{id}','show')->name('Admin.company.show');
            Route::get('company/getInfo/{id}','getInfo')->name('Admin.company.info');

            Route::Post('company/updateInfo','updateInfo')->name('Admin.company.updateinfo');

            Route::Post('company/store','store')->name('Admin.company.store');

            Route::get('pending/companies/{type}','getPending')->name('Admin.companies.pending');

            Route::get('/active/company/{id}','active')->name('Admin.company.active');
            Route::get('/disactive/company/{id}','disActive')->name('Admin.company.disactive');
            Route::get('balance/company/{id}','getBalance');

            Route::post('transfare/money','transfareMoney')->name('Admin.transfare.mony');

            Route::post('delete/company','delete')->name('Admin.company.delete');

            Route::get('company/list','list');

            Route::get('/list/campigns/{company_id}','campignList');
            Route::get('list/{type}','list');


        });

        Route::controller(BankCountroller::class)->group(function(){
               Route::get('bank/account','index')->name('Admin.bank.account'); //
               Route::get('bank/account/store','store')->name('Admin.bank.store');
               Route::post('bank/account/store','delete')->name('Admin.bank.delete');
               Route::post('bank/account/update','update')->name('Admin.bank.update');

               Route::get('transfer/{type}','getTransfares')->name('Admin.bank.transfare');
               Route::get('transfare/list/{type}','list');

               Route::POST('/accept/wallet/transfare','acceptWalletTransfare')->name('Acept.wallet.transfare');

               Route::get('/confirm/transfare/{id}','confirmTransfare')->name('confirm.transfare');
               Route::get('/refuse/transfare/{id}','refuseTransfare')->name('refuse.transfare');
        });

        Route::controller(omravisaController::class)->group(function(){    ///
            Route::get('/omravisa/{type}','index')->name('Admin.omravisas');
            Route::get('list/omravisa/{type}','list');

            Route::get('/omravisas/accept/{id}','accept')->name('Admin.omravisas.accept');

            Route::post('/omravisas/reject','reject')->name('Admin.omravisas.reject');

            Route::get('/omravisas/show/{id}','show')->name('Admin.omravisas.show');

            Route::Post('/omravisas/change/price','changePrice')->name('Admin.omravisa.changeprice');

        });

        Route::controller(barcodeController::class)->group(function(){    // barcode_templats
            Route::get('/barcode/{type}','index')->name('Admin.barcodes');
            Route::get('/barcode/accept/{id}','accept')->name('Admin.barcode.accept');
            Route::Post('/barcode/reject/','reject')->name('Admin.barcode.reject');

            Route::get('/barcode/show/{id}','show')->name('Admin.barcode.show');

            Route::Post('/barcode/change/price','changePrice')->name('Admin.barcode.changeprice');
            Route::get('/list/barcode/{type}','list');
        });


        Route::controller(CampignController::class)->prefix('campaigns')->group(function(){  ///


            Route::get('/{type}','index')->name('Admin.campaigns');

            Route::get('list/{type}','list');

            Route::get('/campaign/show/{id}','show')->name('Admin.campaign.show');



            Route::post('campaign/destroy','destroy')->name('Admin.Campaign.destroy');

            Route::get('campaign/edit/{id}','edit')->name('Admin.Campaign.edit');
            Route::Post('campaign/update','update')->name('Admin.Campaign.update');

            Route::get('campaign/edit/get/cities/{id}','getCities')->name('Admin.get.cities');

            Route::get('distinct/campaigns','getdistinct')->name('Admin.get.distinct');

            Route::get('make/distinct/campaigns/{id}','makeDistinct')->name('Admin.make.distinct');

            Route::get('make/normal/campaigns/{id}','makeNormal')->name('Admin.make.normal');

            Route::post('cancel/campaign','cancel')->name('Admin.cancel.campaign');
            Route::post('delete/campaign','delete')->name('Admin.delete.campaign');


        });


        Route::controller(RegmintController::class)->prefix('campaigns')->group(function(){

            Route::get('/regmint/{id}','show')->name('Admin.regmint.show');
            Route::post('cancel/Booking','cancelBooking')->name('Admin.cancelBooking');

            Route::get('regmint/edit/{id}','edit')->name('Admin.regmint.edit');
            Route::Post('regmint/update','update')->name('Admin.regmint.update');

            Route::get('/regmint/detailes/{id}','getDetailes')->name('Admin.regmint.detailes');
        });

        Route::controller(ProductController::class)->group(function(){

           Route::get('/products','index')->name('Admin.product.index');
           Route::Post('/product/store','store')->name('Admin.product.store');
           Route::get('edit/product/{id}','edit')->name('Admin.product.edit');
           Route::post('update/product','update')->name('Admin.product.update');
           Route::get('show/product/{id}','show')->name('Admin.product.show');
           Route::post('delete/product','delete')->name('Admin.product.delete');


        });


        Route::controller(OrderController::class)->group(function(){

            Route::get('/order/{type}','index')->name('Admin.order.index');
            Route::get('/order/accept/{id}','accept')->name('Admin.order.accept');
            Route::get('/order/reject/{id}','reject')->name('Admin.order.reject');

            Route::get('/order/delivery/{id}','delivery')->name('Admin.order.delivery');
            Route::get('/order/compelet/{id}','compelet')->name('Admin.order.compelet');

            Route::get('/show/order/detailes/{id}','show')->name('Admin.order.detailes');  ///

            Route::get('list/order/{type}','list');
        });

        Route::controller(EmployeeController::class)->group(function(){   //
            Route::get('/employees','index')->name('Admin.employee.index');

            Route::get('/employee/show/{id}','show')->name('Admin.employee.show');
            Route::get('/employee/trash/{id}','trash')->name('Admin.employee.trash');

             Route::post('/employee/store','store')->name('Admin.employee.store');

             Route::get('employee/edit/{id}','edit')->name('Admin.emplouyee.edit');

             Route::post('employee/update','update')->name('Admin.employee.update');

             Route::get('list/employee','list');

        });

        Route::controller(PermissionController::class)->group(function(){ //delete

            Route::get('/permissions','index')->name('Admin.permissions.index');
            Route::Post('/store/role','assignRolePermission')->name('Admin.permission.assign');

            Route::get('/role/delete/{id}','delete')->name('Admin.role.index');
            Route::get('/get/role/{id}','getRole')->name('Admin.role.get');

            Route::Post('/update/role','update')->name('Admin.role.update');
        });

        Route::controller(PromocodeController::class)->group(function(){  //
            Route::get('/Promocode','index')->name('Admin.Promocode.index');
            Route::post('promocode/srore','store')->name('Admin.promocode.store');
            Route::post('Admin/promocode/update','update')->name('Admin.promocode.update');
            Route::post('Admin/promocode/delete','delete')->name('Admin.promocode.delete');
        });


        Route::controller(CountryController::class)->group(function(){  //
            Route::get('/countries','index')->name('Admin.countries.index');
            Route::get('/countries/list','list');
            Route::get('/city/{country_id}','city')->name('Admin.country.city');  //
            Route::get('/cities/list/{country_id}','citylist');
            Route::post('city/store','store')->name('Admin.city.store');

            Route::post('city/destory','destory')->name('Admin.city.delete');
            Route::post('city/update','updatecity')->name('Admin.city.update');
            Route::get('/country/edit/{id}','edit')->name('Admin.country.edit');

            Route::post('country/update','update')->name('Admin.country.update');
        });


        Route::controller(SettingController::class)->group(function(){  //

              Route::get('setting/general','general')->name('Admin.setting.general');
              Route::post('setting/about/update','aboutUpdate')->name('setting.about.update');
              Route::post('setting/policy/update','policeyUpdate')->name('setting.privaceyPolicy.update');
              Route::post('setting/terms/update','termsUpdate')->name('setting.termCondations.update');
              Route::post('setting/contact/update','contactUpdate')->name('setting.contact.update');

              Route::get('setting/campaigns','campaign')->name('Admin.setting.campaign');
              Route::post('setting/campaign/update','updateCampaign')->name('setting.campaign.update');

        });

    });

});
