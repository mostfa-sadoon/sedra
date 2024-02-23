<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin=Admin::first();
        $permissions=Permission::select('name')->pluck('name')->all();

       // dd($permissions);
        $data['permissions']=$permissions;
        $role= Role::find(1);
        if($role==null){
            $role =  Role::create([
                'name'            =>'Super Admin',
                'guard_name'      =>'web',
                'super_admin'     =>true
             ]);
             $role->syncPermissions($data);
             $admin->assignRole($role->name);
        }else{
            $role->update([
                'name'            =>'Super Admin',
                'guard_name'      =>'web',
            ]);
            $role->syncPermissions($data);
        }

    }
}
