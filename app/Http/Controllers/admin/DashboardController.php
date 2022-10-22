<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $date         = date('Y-m-d');
        $currentMonth = date('m');
        $currentYear  = date('Y');

        $users    = DB::table('users')->get()->count();
        $drivers  = DB::table('users')->get()->count();
        $services = DB::table('services')->get()->count();

        $all_today = DB::table('orders')->select('orders.*')
         ->where('booked_at', $date)
         ->get()->count();

        $all_week = DB::table('orders')->select('orders.*')
          ->whereBetween('booked_at', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
         ->get()->count();

        $all_month = DB::table('orders')->select('orders.*')
         ->whereRaw('MONTH(booked_at) = ?',[$currentMonth])
         ->whereRaw('YEAR(booked_at) = ?',[$currentYear])
         ->get()->count();

        // $orders = DB::table('orders')->select('orders.id','orders.user_id','booked_at','orders.total','users.name','users.email')
        //   ->join('users','users.id','=','orders.user_id')
        //   ->orderBy('orders.id','desc')
        //   ->get();
        $data = [
                    'users'          => $users,
                    'drivers'        => $drivers,
                    'services'       => $services,
                    'orders_today'   => $all_today,
                    'orders_weekly'  => $all_week,
                    'orders_monthly' => $all_month,
                 ]; 
        return view('admin.dashboard',$data);
    }
}
