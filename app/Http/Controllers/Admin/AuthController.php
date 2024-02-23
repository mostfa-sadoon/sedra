<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Alert;
class AuthController extends Controller
{
    //

    public function index(){

        return view('admin.Auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
         ]);
         $credentials = $request->only('email', 'password');
         if (Auth::guard('web')->attempt($credentials)) {
             return redirect()->route('Admin.home');
         }
         return redirect()->route('Admin.login.index')->with('error','Login details are not valid');
    }


    public function logout(Request $request){
        Auth::guard('web')->logout();
        return redirect()->route('Admin.login.index');
    }

    public function profile(Request $request){
       $employee = Auth::guard('web')->user();
       return view('admin.employee.profile',compact('employee'));
    }
    public function update(Request $request){

        $employee = Auth::guard('web')->user();
        $role=$employee->getRoleNames();
       

        $employee->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        $employee->syncRoles([$role]);
        Alert::success(__('dashboard.success'), __('dashboard.update_success'));
        return redirect()->back();
    }

    public function updatePassword(Request $request){

            $request->validate([
                'password'              => 'required|min:6|max:50|confirmed',
                'password_confirmation' => 'required|max:50|min:6',
            ]);


          $employee = Auth::guard('web')->user();
            if (Hash::check($request->old_password, $employee->password)) {
                $employee->update([
                    'password' => $request->password,
                ]);

                Alert::success(__('dashboard.success'), __('dashboard.update_password'));
                return redirect()->back();

           }


         return back()->withErrors(['old_password' => 'The old password is incorrect.']);
    }
}

