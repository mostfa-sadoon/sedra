<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Company,User,Campaign,Order};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        $companyCount=Company::count();
        $userCount=User::count();
        $campaignCount=Campaign::count();
        $ordersCount=Order::count();

        // start orders statistics
        $monthelyorders=Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->get();



        $countsByMonth = array_fill(1, 12, 0);

        // Fill in the counts from the query result
        foreach ($monthelyorders as $row) {
            $countsByMonth[$row->month] = $row->count;
        }


        // start users statistics

        $monthelyusers=User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->get();

        $usercountsByMonth = array_fill(1, 12, 0);


        // Fill in the counts from the query result
        foreach ($monthelyusers as $row) {
            $usercountsByMonth[$row->month] = $row->count;
        }

        // start users companies

        $monthelycompanies=Company::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->get();


        $companycountsByMonth = array_fill(1, 12, 0);

        // Fill in the counts from the query result
        foreach ($monthelycompanies as $row) {
            $companycountsByMonth[$row->month] = $row->count;
        }


        // monthely sales


        $monthelysales=Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('Sum(price_after_discount) as sale'))
        ->wherein('status',[1,2,3,4])
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->get();


        $salescountsByMonth = array_fill(1, 12, 0);

        // Fill in the counts from the query result
        foreach ($monthelysales as $row) {
            $salescountsByMonth[$row->month] = $row->sale;
        }

        $startDate = now()->startOfWeek(); // Start of the current week
        $endDate = now()->endOfWeek(); // End of the current week

        // weekly sales
        $weaklysales=Order::select(DB::raw('DAYNAME(created_at) as day_of_week'), DB::raw('Sum(price_after_discount) as sale'))
        ->wherein('status',[1,2,3,4])
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('day_of_week')
        ->get();

         //dd($weaklysales);

        $salescountsByweek = [
            'Saturday' => 0,
            'Sunday' => 0,
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,

        ];


        // Fill in the counts from the query result
        foreach ($weaklysales as $key=>$row) {
            $salescountsByweek[$row->day_of_week] = $row->sale;
        }


        // get new orders
        $orders=Order::with('detailes')->where('status',1)->orderBy('created_at', 'desc')
        ->take(20)
        ->get();



        $completedcount=Order::where('status',4)->count();
        $rejectedcount=Order::where('status',5)->count();

        $canceledcount=Order::where('status',6)->count();


        // calculate percent
        $completedpercent=($completedcount/$ordersCount)*100;
        $rejectpercent=($rejectedcount/$ordersCount)*100;
        $cancelpercent=($canceledcount/$ordersCount)*100;


        return view('home',compact('companyCount','userCount','campaignCount','countsByMonth','monthelyorders','monthelyusers',
        'usercountsByMonth','monthelycompanies','companycountsByMonth','ordersCount','orders','salescountsByMonth','salescountsByweek','completedcount','rejectedcount','canceledcount'
         ,'completedpercent','rejectpercent','cancelpercent'
    ));
    }
}
