<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicePrice;
class service_prices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ServicePrice::create([
            'name'   =>'BarCODE',
            'price'  =>5
        ]);

        ServicePrice::create([
            'name'   =>'OmraVisa',
            'price'  =>5
        ]);
    }
}
