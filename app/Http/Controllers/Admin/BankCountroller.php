<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\{Bank,BankTransfare,User};
use Alert;
use Auth;
use App;

class BankCountroller extends Controller
{
    //
    public function index(){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_banks'))
        return redirect()->back();

        $banks=Bank::get();
        return view('admin.bank.index',compact('banks'));
    }
    public function store(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('add_banks'))
        return redirect()->back();


        $bank = new Bank();
        $bank->account_number     = $request->account_number;

        foreach (config('translatable.locales') as $locale) {
            $bank->translateOrNew($locale)->name = $request->input($locale.'.name');
        }

        $bank->save();
        Alert::success(__('dashboard.success'), __('dashboard.add_success'));
        return redirect()->back();
    }

    public function delete(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('delete_banks'))
        return redirect()->back();


         $bank=Bank::find($request->id);
         $bank->delete();

         Alert::success(__('dashboard.success'), __('dashboard.add_success'));
         return redirect()->back();

    }

    public function update(Request $request){


        if(!Auth::guard('web')->user()->hasPermissionTo('update_banks'))
        return redirect()->back();


        try{
             DB::beginTransaction();


                $bank=Bank::find($request->id);
                $bank->account_number     = $request->account_number;
                $bank->save();

                foreach (config('translatable.locales') as $locale) {
                    $bank->translateOrNew($locale)->name = $request->input($locale.'.name');
                }

               $bank->save();

                DB::commit();
                Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }

    public function getTransfares($type){

        if(!Auth::guard('web')->user()->hasPermissionTo('show_transfares'))
        return redirect()->back();


        $transfers=BankTransfare::where('type',$type)->get();
        return view('admin.bank.transfares',compact('transfers','type'));
    }

     // use this function to get data in datatable
     public function list(Request $request,$type){



        $query=BankTransfare::query()
        ->join('users','users.id','=','bank_transfares.user_id')
        ->join('banks','banks.id','=','bank_transfares.bank_id')
        ->join('bank_translations','banks.id','=','bank_translations.bank_id')
        ->where('bank_translations.locale',App::getLocale());

        $order = $request['order'];

        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query

            ->where(function ($query) use ($search,$type) {
                $query
                       ->where('users.name', 'like', '%' . $search . '%')
                       ->orwhere('bank_translations.name', 'like', '%' . $search . '%');
                ;
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

        $data = $query->select('bank_transfares.id','bank_transfares.amount','bank_transfares.confirmation','users.name','users.id as user_id','bank_translations.name as bank_name','bank_transfares.img as img','bank_transfares.created_at as created_at')->where('type',$type)->get()

        ->map(function ($item) {
            return [
                'id'            =>$item->id,
                'user_id'       =>$item->user_id,
                'name'          =>$item->name,
                'bank'          =>$item->bank_name,
                'amount'        =>$item->amount,
                'img'           =>$item->img,
                'confirmation'  =>$item->confirmation,
                'created_at'    =>$item->created_at->format(' H:i Y-m-d')   // Format the date
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);

    }


    public function acceptWalletTransfare(Request $request){

        try{
            DB::beginTransaction();
                if(!Auth::guard('web')->user()->hasPermissionTo('show_transfares'))
                return redirect()->back();
                $user=User::find($request->user_id);

                $user->wallet=$user->wallet+$request->balance;

                $transfer=BankTransfare::find($request->trans_id);


                $transfer->confirmation='accepted';
                $transfer->save();
                $user->save();


                DB::commit();
                Alert::success(__('dashboard.success'), __('dashboard.add_success'));

            return redirect()->back();
            }catch(\Exception $ex){
                return redirect()->back();
            }
    }


    public function confirmTransfare($id){


        try{
            DB::beginTransaction();
                if(!Auth::guard('web')->user()->hasPermissionTo('show_transfares'))
                return redirect()->back();


                $transfer=BankTransfare::find($id);


                $transfer->confirmation='accepted';
                $transfer->save();


                 DB::commit();
                Alert::success(__('dashboard.success'), __('dashboard.success'));

                return redirect()->back();
            }catch(\Exception $ex){
                return redirect()->back();
            }
    }


    public function refuseTransfare($id){

        try{
            DB::beginTransaction();
                if(!Auth::guard('web')->user()->hasPermissionTo('show_transfares'))
                return redirect()->back();


                $transfer=BankTransfare::find($id);


                $transfer->confirmation='rejected';
                $transfer->save();


                 DB::commit();
                Alert::success(__('dashboard.success'), __('dashboard.success'));

                return redirect()->back();
            }catch(\Exception $ex){
                return redirect()->back();
            }
    }
}
