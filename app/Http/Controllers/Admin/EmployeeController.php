<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Alert;
use Validator;
use Illuminate\Validation\Rule;
use Auth;

class EmployeeController extends Controller
{
    //
    public function index(){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_employees'))
        return redirect()->back();
       $roles=Role::get();
       return view('admin.employee.index',compact('roles'));
    }

    // use this function to get data in datatable
    public function list(Request $request){

        $query=Admin::query();
        $order = $request['order'];


        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($search) {
                $query->where('admins.name', 'like', '%' . $search . '%')
                    ->orWhere('admins.email', 'like', '%' . $search . '%');
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

        $data = $query->get()
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'name' =>$item->name,
                'email' =>$item->email,
                'created_at' => $item->created_at->format('Y-m-d H:i:s')   // Format the date
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);

    }


    public function edit($id){
        $employee=Admin::find($id);
        $role=$employee->getRoleNames();
        return [
            'employee'  =>$employee,
            'role'      =>$role
        ];
    }

    public function update(Request $request){
        if(!Auth::guard('web')->user()->hasPermissionTo('update_employees'))
        return redirect()->back();

        $rules = [
            'name' => [
                'required',
                Rule::unique('admins', 'name')->ignore($request->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email')->ignore($request->id),
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->with('modal', 'storeErrorModal');
        }



          $employee=Admin::find($request->id);
          $employee->update([
             'name'   =>$request->name,
             'email'  =>$request->email,
          ]);
          $employee->syncRoles([$request->role]);
          Alert::success(__('dashboard.success'), __('dashboard.update_success'));

          return redirect()->back();
    }


    public function show($id){

        $employee=Admin::find($id);
        return view('admin.employee.show',compact('employee'));
    }

    public function trash($id){
        
        if(!Auth::guard('web')->user()->hasPermissionTo('delete_employees'))
        return redirect()->back();

        $employee=Admin::find($id);
        $employee->delete();

        return redirect()->back();
    }

    public function store(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('store_employees'))
        return redirect()->back();

        $rules = [
            'name'   =>'unique:admins,name',
            'email'   =>'unique:admins,email'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->with('modal', 'storeErrorModal');
        }

        $employee= Admin::create([
           'name'         =>$request->name,
           'password'     =>$request->password,
           'email'        =>$request->email
        ]);

        $employee->assignRole($request->role);

        return redirect()->back();

    }
}
