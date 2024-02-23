<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Country,City,CountryTranslation,CityTranslation};
use Illuminate\Support\Facades\DB;
use Alert;
use Auth;

class CountryController extends Controller
{
    //
    public function index(){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_countrirs'))
        return redirect()->back();

         return view('admin.countries.index');
    }
    public function list(Request $request)
    {
        $query = Country::query();


        $order = $request['order'];

         // Handle searching/filtering
        if ($request->has('search.value')) {
            $search = $request->input('search.value');
            $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                 ->where('locale','ar');

            });

        }

           //Order the results by the translated name
            // if (isset($order) && count($order)) {
            //     $column = $order[0];
            //     $query->join('country_translations', 'country_translations.country_id', '=', 'countries.id')
            //     ->select('*')
            //     ->orderBy('country_translations.name', 'asc');



            // }



        // Count total records (needed for pagination)
        $totalRecords = $query->count();

        $start = $request->input('start');
        $length = $request->input('length');
        $query->skip($start)->take($length);

        $data = $query
           ->get()
            ->map(function ($item) {
                return [
                    'id'         => $item->id,
                    'name'       => $item->name,
                    'status'     => $item->status,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'actions'    => '',
                ];
            });

        return response()->json([
            'draw'            => $request->input('draw'),
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data'            => $data,
        ]);
    }


    public function city($country_id){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_cities'))
        return redirect()->back();

        $cities=City::where('country_id',$country_id)->get();
        return view('admin.countries.city',compact('cities','country_id'));
    }

    public function store(Request $request){


            $status=true;
            if($request->status=="0")
            $status=false;



            $city = new City();
            $city->status     = $status;
            $city->country_id =$request->country_id;
            $city->save();

            foreach (config('translatable.locales') as $locale) {
                $city->translateOrNew($locale)->name = $request->input($locale.'.name');

            }

            $city->save();
            Alert::success(__('dashboard.success'), __('dashboard.add_success'));

            return redirect()->back();

    }

    public function destory(Request $request){

        $city=City::find($request->city_id);
        $city->delete();

        Alert::success(__('dashboard.success'), __('dashboard.delete'));

        return redirect()->back();

    }

    public function updatecity(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_city'))
        return redirect()->back();

        try{
             DB::beginTransaction();

                $status=true;
                if($request->status=="0")
                $status=false;

                $city=City::find($request->edit_city_id);
                $city->status     = $status;
                $city->country_id =$city->country_id;
                $city->save();

              foreach (config('translatable.locales') as $locale) {
                $city->translateOrNew($locale)->name = $request->input($locale.'.name');

              }

              $city->save();

            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.update'));

            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }



     public function edit($id){
         $country=Country::find($id);
         return view('admin.countries.edit',compact('country'));
     }




    public function update(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_country'))
        return redirect()->back();
        try{
            DB::beginTransaction();

               $status=true;
               if($request->status=="0")
               $status=false;

             $country=country::find($request->edit_country_id);
             $country->status     = $status;
             $country->save();

             foreach (config('translatable.locales') as $locale) {
               $country->translateOrNew($locale)->name = $request->input($locale.'.name');

             }

             $country->save();

           DB::commit();
           Alert::success(__('dashboard.success'), __('dashboard.update'));

           return redirect()->back();
       }catch(\Exception $ex){
           return redirect()->back();
       }
    }

}
