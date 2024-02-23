<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class updatepermission extends Seeder
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
                'name'          =>'cancel_campaigns',
                'guard_name'    =>'web',
                'module_name'   =>'campaigns'
            ],

            [
                'name'          =>'cancel_booking',
                'guard_name'    =>'web',
                'module_name'   =>'campaigns'
            ],

            [
                'name'          =>'store_company',
                'guard_name'    =>'web',
                'module_name'   =>'campaigns'
            ],

            [
                'name'          =>'show_countrirs',
                'guard_name'    =>'web',
                'module_name'   =>'countries'
            ],
            [
                'name'          =>'show_cities',
                'guard_name'    =>'web',
                'module_name'   =>'countries'
            ],

            [
                'name'          =>'update_country',
                'guard_name'    =>'web',
                'module_name'   =>'countries'
            ],
            [
                'name'          =>'update_city',
                'guard_name'    =>'web',
                'module_name'   =>'countries'
            ],


            [
                'name'          =>'show_setting',
                'guard_name'    =>'web',
                'module_name'   =>'settings'
            ],

            [
                'name'          =>'show_general_setting',
                'guard_name'    =>'web',
                'module_name'   =>'settings'
            ],
            [
                'name'          =>'show_campain_setting',
                'guard_name'    =>'web',
                'module_name'   =>'settings'
            ],


        ];


        Permission::insert($permissions);

    }
}
