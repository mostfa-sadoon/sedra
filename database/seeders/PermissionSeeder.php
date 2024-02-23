<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
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
                        'name'          =>'show_orders',
                        'guard_name'    =>'web',
                        'module_name'   =>'orders'
                    ],

                    [
                        'name'          =>'accept_order',
                        'guard_name'    =>'web',
                        'module_name'   =>'orders'
                    ],

                    [
                        'name'          =>'reject_order',
                        'guard_name'    =>'web',
                        'module_name'   =>'orders'
                    ],

                    [
                        'name'          =>'show_products',
                        'guard_name'    =>'web',
                        'module_name'   =>'products'
                    ],

                    [
                        'name'          =>'store_product',
                        'guard_name'    =>'web',
                        'module_name'   =>'products'
                    ],

                    [
                        'name'          =>'update_product',
                        'guard_name'    =>'web',
                        'module_name'   =>'products'
                    ],

                    [
                        'name'          =>'delete_product',
                        'guard_name'    =>'web',
                        'module_name'   =>'products'

                    ],


                    [
                        'name'          =>'show_promocode',
                        'guard_name'    =>'web',
                        'module_name'   =>'promocode'
                    ],


                    [
                        'name'          =>'store_promocode',
                        'guard_name'    =>'web',
                        'module_name'   =>'promocode'
                    ],

                    [
                        'name'          =>'update_promocode',
                        'guard_name'    =>'web',
                        'module_name'   =>'promocode'
                    ],

                    [
                        'name'          =>'delete_promocode',
                        'guard_name'    =>'web',
                        'module_name'   =>'promocode'
                    ],

                     // end ecommerce


                     // start campaigns

                     [
                        'name'          =>'show_campaigns',
                        'guard_name'    =>'web',
                        'module_name'   =>'campaigns'
                    ],

                    [
                        'name'          =>'update_campaigns',
                        'guard_name'    =>'web',
                        'module_name'   =>'campaigns'
                    ],


                    [
                        'name'          =>'show_distinct_campaigns',
                        'guard_name'    =>'web',
                        'module_name'   =>'campaigns'
                    ],

                    [
                        'name'          =>'delete_campaigns',
                        'guard_name'    =>'web',
                        'module_name'   =>'campaigns'
                    ],


                    [
                        'name'          =>'update_regmints',
                        'guard_name'    =>'web',
                        'module_name'   =>'regmints'
                    ],

                    [
                        'name'          =>'delete_regmints',
                        'guard_name'    =>'web',
                        'module_name'   =>'regmints'
                    ],


                    // end campaigns

                     // start companies
                    [
                        'name'          =>'show_companies',
                        'guard_name'    =>'web',
                        'module_name'   =>'campaigns'
                    ],

                    [
                        'name'          =>'update_companies',
                        'guard_name'    =>'web',
                        'module_name'   =>'campaigns'
                    ],


                    [
                        'name'          =>'active_companies',
                        'guard_name'    =>'web',
                        'module_name'   =>'companies'
                    ],

                    [
                        'name'          =>'disable_companies',
                        'guard_name'    =>'web',
                        'module_name'   =>'companies'
                    ],

                    // end companies


                        // start omravisa
                        [
                            'name'          =>'show_omravisa',
                            'guard_name'    =>'web',
                            'module_name'   =>'omravisa'
                        ],

                        [
                            'name'          =>'update_omravisa',
                            'guard_name'    =>'web',
                            'module_name'   =>'omravisa'
                        ],


                        [
                            'name'          =>'accept_omravisa',
                            'guard_name'    =>'web',
                            'module_name'   =>'companies'
                        ],

                        [
                            'name'          =>'reject_omravisa',
                            'guard_name'    =>'web',
                            'module_name'   =>'omravisa'
                        ],

                        // end omravisa


                         // start barcode
                         [
                            'name'          =>'show_barcode',
                            'guard_name'    =>'web',
                            'module_name'   =>'barcode'
                        ],

                        [
                            'name'          =>'update_barcode',
                            'guard_name'    =>'web',
                            'module_name'   =>'barcode'
                        ],


                        [
                            'name'          =>'accept_barcode',
                            'guard_name'    =>'web',
                            'module_name'   =>'barcode'
                        ],

                        [
                            'name'          =>'reject_barcode',
                            'guard_name'    =>'web',
                            'module_name'   =>'barcode'
                        ],

                        // end barcode

                        // start employee
                        [
                            'name'          =>'show_employees',
                            'guard_name'    =>'web',
                            'module_name'   =>'employees'
                        ],

                        [
                            'name'          =>'update_employees',
                            'guard_name'    =>'web',
                            'module_name'   =>'employees'
                        ],

                        [
                            'name'          =>'store_employees',
                            'guard_name'    =>'web',
                            'module_name'   =>'store'
                        ],


                        [
                            'name'          =>'delete_employees',
                            'guard_name'    =>'web',
                            'module_name'   =>'employees'
                        ],

                        // endemployee



                        // start users
                        [
                            'name'          =>'show_users',
                            'guard_name'    =>'web',
                            'module_name'   =>'users'
                        ],

                        [
                            'name'          =>'update_users',
                            'guard_name'    =>'web',
                            'module_name'   =>'users'
                        ],

                        [
                            'name'          =>'store_users',
                            'guard_name'    =>'web',
                            'module_name'   =>'users'
                        ],


                        [
                            'name'          =>'delete_users',
                            'guard_name'    =>'web',
                            'module_name'   =>'users'
                        ],

                        // end users

                         // start roles
                        [
                            'name'          =>'show_roles',
                            'guard_name'    =>'web',
                            'module_name'   =>'roles'
                        ],

                        [
                            'name'          =>'update_roles',
                            'guard_name'    =>'web',
                            'module_name'   =>'roles'
                        ],

                        [
                            'name'          =>'store_roles',
                            'guard_name'    =>'web',
                            'module_name'   =>'roles'
                        ],


                        [
                            'name'          =>'delete_roles',
                            'guard_name'    =>'web',
                            'module_name'   =>'roles'
                        ],

                        // end users







                    ];


                    Permission::insert($permissions);
    }
}
