<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Alert;
use Auth;

class PermissionController extends Controller
{
    //
    public function index(){

        if(!Auth::guard('web')->user()->hasPermissionTo('show_roles'))
        return redirect()->back();

       $permissions=Permission::get();
       $roles=Role::get();

       return view('admin.permission.index',compact('permissions','roles'));
    }

    public function getRole($id){
        $permissions=Permission::get();
        $role=Role::find($id);
        return view('admin.permission.role',compact('role','permissions'));
    }

    public function assignRolePermission(Request $request){
        

            if(!Auth::guard('web')->user()->hasPermissionTo('store_roles'))
            return redirect()->back();
        
          $role =  Role::create([
             'name'            =>$request->name,
             'guard_name'      =>'web',
          ]);

          $role->syncPermissions($request->input('permissions'));

        return redirect()->back();
    }

    public function delete($id){
        if(!Auth::guard('web')->user()->hasPermissionTo('delete_roles'))
        return redirect()->back();

         $role=Role::find($id);
         $role->delete();
         return redirect()->back();

    }

    public function update(Request $request){

        if(!Auth::guard('web')->user()->hasPermissionTo('update_roles'))
        return redirect()->back();

        $role = Role::find($request->id);

        $role->update([
            'name'            =>$request->name,
            'guard_name' => 'web', // Optionally, specify the guard name if needed
        ]);

         $role->syncPermissions($request->input('permissions'));

         Alert::success(__('dashboard.success'), __('dashboard.update_success'));

       return redirect()->back();
    }
}
