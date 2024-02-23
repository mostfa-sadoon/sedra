<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin as AdminModel;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AdminModel::create([
           'name'      =>'sedra admin',
           'email'     =>'admin@admin.com',
           'superadmin'=>1,
           'password'  => 123456
        ]);
    }
}
