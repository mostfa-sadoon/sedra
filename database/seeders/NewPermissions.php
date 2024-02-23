<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class NewPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        //
        $permissions = [
            // start ecommerce
            [
                'name'          =>'show_banks',
                'guard_name'    =>'web',
                'module_name'   =>'banks'
            ],

            [
                'name'          =>'add_banks',
                'guard_name'    =>'web',
                'module_name'   =>'banks'
            ],

            [
                'name'          =>'delete_banks',
                'guard_name'    =>'web',
                'module_name'   =>'banks'
            ],

            [
                'name'          =>'update_banks',
                'guard_name'    =>'web',
                'module_name'   =>'banks'
            ],

            [
                'name'          =>'show_transfares',
                'guard_name'    =>'web',
                'module_name'   =>'bank_transfares'
            ],





        ];


        Permission::insert($permissions);

    }
}
