<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Company,CompanyNotification,CompanyNotificationTranslation,Campaign,CompanyBankAccount};
use App\Http\Requests\web\StoreCompany;
use App\Traits\{response,fileTrait};
use Illuminate\Support\Facades\DB;
use App\Interfaces\{NotificationRepositoryinterface};
use Illuminate\Support\Facades\File;
use Alert;
use Carbon\Carbon;
use Auth;

class CompanyController extends Controller
{
    //
    use response,fileTrait;


    public function __construct(NotificationRepositoryinterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }


    public function index($type){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_companies'))
        return redirect()->back();

        return view('admin.companies.index',compact('type'));
    }



    public function list(Request $request,$type){
            $query=Company::query();
            $order = $request['order'];


        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($search,$type) {
                $query
                    ->where('companies.name', 'like', '%' . $search . '%')
                    ->orWhere('companies.phone', 'like', '%' . $search . '%');
                // Add more columns as needed
            });
        }

        // $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        if (isset($order) && count($order)){
            $column = $order[0];
            $query = $query->orderBy($request->columns[+$column['column']]['data'], $column['dir']);
        }

        //$query->orderBy('created_at', $orderDirection);

        // Count total records (needed for pagination)
        $totalRecords = $query->count();

        $start = $request->input('start');
        $length = $request->input('length');
        $query->skip($start)->take($length);

       // $data = $query;

        $data = $query->where('status',$type)->get()
        ->map(function ($item) use($type){
            return [
                'id'                =>$item->id,
                'name'              =>$item->name,
                'logo'              =>$item->logo,
                'phone'             =>$item->phone,
                'email'             =>$item->email,
                'country_code'      =>$item->country_code,
                'balance'           =>$item->balance,
                'created_at'        =>$item->created_at->format('Y-m-d'),   // Format the date
                'status'            =>$item->status,
                'actions'           =>''
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);

    }

    public function store(StoreCompany $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('store_company'))
        return redirect()->back();

        try{

            DB::beginTransaction();

                $img=$this->MoveImage($request->img,'uploads/companies/logo/');

                $company= Company::create([
                   'name'         =>$request->name,
                   'email'        =>$request->email,
                   'lang'         =>'ar',
                   'password'     =>$request->password,
                   'phone'        =>$request->phone,
                   'country_code' =>$request->country_code,
                   'logo'         =>$img,
                   'status'       =>true
                ]);

                foreach($request->bank_names as $key=>$bankname){
                    CompanyBankAccount::create([
                          'company_id'         =>$company->id,
                          'name'               =>$bankname,
                          'account_number'     =>$request->account_number[$key]
                    ]);
                }


            DB::commit();

           Alert::success(__('dashboard.success'), __('dashboard.update'));
           return redirect()->back();
       }catch(\Exception $ex){
               return redirect()->back();
       }

    }



    public function show($id){

        $company=Company::with([

             'campaign',
             'companyBankAccounts'

        ])
        ->find($id);
        return view('admin.companies.show',compact('company'));

    }

    public function campignList(Request $request,$company_id){

            $query=campaign::query();
            $order = $request['order'];


            // Handle searching/filtering
            if ($request->has('search')) {
                $search = $request->input('search.value');
                $query->with(['country','regiments'])->where(function ($query) use ($search,$company_id) {
                    $query
                    ->where('.campaigns.company_id',$company_id);
                        // ->where('orders.name', 'like', '%' . $search . '%')
                        // ->orWhere('orders.email', 'like', '%' . $search . '%');
                    // Add more columns as needed
                });
            }

            // $orderColumn = $request->input('order.0.column');
            $orderDirection = $request->input('order.0.dir');
            if (isset($order) && count($order)){
                $column = $order[0];
                $query = $query->orderBy($request->columns[+$column['column']]['data'], $column['dir']);
            }

            // Count total records (needed for pagination)
            $totalRecords = $query->count();

            $start = $request->input('start');
            $length = $request->input('length');
            $query->skip($start)->take($length);



        $data = $query->where('company_id',$company_id)
        ->with(['country','regiments'])
        ->get()
        ->map(function ($item){
            return [
                'name'                 =>$item->name,
                'id'                   =>$item->id,
                'country'              =>$item->country->name,
                'city'                 =>$item->city->name,
                'single_price'         =>$item->single_price,
                'double_price'         =>$item->double_price,
                'program'              =>$item->program,
                'regiments'             =>$item->regiments->count(),
                'created_at'           =>$item->created_at->format('Y-m-d'),   // Format the date
                'actions'              =>''
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);


    }


    public function getInfo($id){

         $company=Company::with('companyBankAccounts')->find($id);
         return view('admin.companies.info',compact('company'));
    }


    public function updateInfo(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_companies'))
        return redirect()->back();
        // dd($request->all());

         try{

            DB::beginTransaction();

                $company=Company::find($request->id);
                $bankaccounts=CompanyBankAccount::where('company_id',$request->id)->get();

                // if admin didn't change img
                $img_arr=explode("/",$company->logo);

                $index=(count($img_arr))-1;
                $img=$img_arr[$index];
                $img_path= public_path('uploads/companies/logo/'.$img);


                if($request->img!=null){
                    $img=$this->MoveImage($request->img,'uploads/companies/logo/');

                    // remove old img
                    if (File::exists($img_path)) {

                        File::delete($img_path);
                        // Optionally, you can also check if the deletion was successful.
                    }
                }


                $company->update([
                'logo'            =>$img,
                'country_code'   =>$request->country_code,
                'phone'          =>$request->phone,
                'name'          =>$request->name
                ]);

                foreach($bankaccounts as $bankaccount){
                    $bankaccount->delete();
                }

                foreach($request->bank_names as $key=>$bankname){
                    CompanyBankAccount::create([
                          'company_id'         =>$request->id,
                          'name'               =>$bankname,
                          'account_number'     =>$request->account_numbers[$key]
                    ]);
                }


            DB::commit();

            Alert::success(__('dashboard.success'), __('dashboard.update'));
            return redirect()->back();
        }catch(\Exception $ex){
                return redirect()->back();
        }
    }


    public function getPending($type){
        $companies=Company::where('status',0)->paginate(50);
        return view('admin.companies.index',compact('companies','type'));

    }

    public function active($id){

        if(!Auth::guard('web')->user()->hasPermissionTo('active_companies'))
        return redirect()->back();

        $company=Company::find($id);
        $company->update(['status'=>true]);

             // send notify to company
            $companynotification=CompanyNotification::create([
                'company_id' =>  $company->id
            ]);

            $langs=['ar','en'];
            foreach($langs as $lang){
                if($lang=='ar'){
                    $title='تفعيل الشركه';
                    $body='لقد تم تفعيل شركتك';
                }else{
                    $title='activeation';
                    $body='your company activated';
                }
                CompanyNotificationTranslation::create([
                    'company_notification_id' =>$companynotification->id,
                    'locale'    =>$lang,
                    'title'     =>$title,
                    'body'      =>$body,
                ]);
            }

            if($company->lang=='ar'){
                $title='تفعيل الشركه';
                $body='لقد تم تفعيل شركتك';
             }else{
                $title='activeation';
                $body='your company activated';
             }
             $this->NotificationRepository->sendnotification('company',$company->id,$title,$body);

        return true;
    }

    public function disActive($id){
        if(!Auth::guard('web')->user()->hasPermissionTo('disable_companies'))
        return redirect()->back();

        $company=Company::find($id);
        $company->update(['status'=>false]);

         // send notify to company
         $companynotification=CompanyNotification::create([
            'company_id' =>  $company->id
        ]);

        $langs=['ar','en'];
        foreach($langs as $lang){
            if($lang=='ar'){
                $title='الغاء تفعيل ';
                $body='لقد تم الغاء تفعيل شركتك';
            }else{
                $title='deactivation';
                $body='your company deactivation';
            }
            CompanyNotificationTranslation::create([
                'company_notification_id' =>$companynotification->id,
                'locale'    =>$lang,
                'title'     =>$title,
                'body'      =>$body,
            ]);
        }

        if($company->lang=='ar'){
            $title='الغاء تفعيل ';
                $body='لقد تم الغاء تفعيل شركتك';
         }else{
            $title='deactivation';
            $body= $user->name.'your company deactivation';
         }
         $this->NotificationRepository->sendnotification('company',$company->id,$title,$body);


        return true;

    }


    public function getBalance($id){
        $balance=Company::find($id)->balance;
        return $balance;
    }

    public function transfareMoney(Request $request){

        $company=Company::find($request->id);

         if($request->balance>$company->balance)
         return redirect()->back()->with('errors','you skip the limit of balance');


        $company->balance=$company->balance-$request->balance;
        $company->save();

        Alert::success(__('dashboard.success'), __('dashboard.success_transfare_money'));

        return redirect()->back();

    }

    public function delete(Request $request){
        $company=Company::find($request->id);
        $campaign=Campaign::whereHas('regiments',function($q)use ($request){
            $q->whereDate('date','>',Carbon::now());
        })->where('company_id',$company->id)->first();

         if($campaign!=null)
          return redirect()->back()->with('hascampaign',__('dashboard.has_campaign'));

        $company->delete();
        return redirect()->back();
    }

}
