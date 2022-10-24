<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Order;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

/*Get Pending Orders*/
    public function pending()
    {
        $orders = Order::select('orders.*','users.name','users.email','service_name_english','service_name_arabic')
                 ->join('users','users.id','=','orders.user_id')
                 ->join('services','services.id','=','orders.service_id')
                 ->where('orders.status','1')
                 ->orderBy('orders.id','desc')
                 ->get(); 
        return view('admin.orders.pending', compact('orders')); 
    }

/*Get Approved Orders*/
    public function approved()
    {
        $orders = Order::select('orders.*','users.name','users.email','service_name_english','service_name_arabic','drivers.name as driver_name','drivers.mobile as driver_mobile')
                 ->join('users','users.id','=','orders.user_id')
                 ->join('services','services.id','=','orders.service_id')
                 ->join('drivers','drivers.id','=','orders.order_delivered_by')
                 ->where('orders.status','2')
                 ->orderBy('orders.id','desc')
                 ->get(); 
        return view('admin.orders.approved', compact('orders')); 
    } 

/*Get Approved Orders*/
    public function completed()
    {
        $orders = Order::select('orders.*','users.name','users.email','service_name_english','service_name_arabic','drivers.name as driver_name','drivers.mobile as driver_mobile')
                 ->join('users','users.id','=','orders.user_id')
                 ->join('services','services.id','=','orders.service_id')
                 ->join('drivers','drivers.id','=','orders.order_delivered_by')
                 ->where('orders.status','3')
                 ->orderBy('orders.id','desc')
                 ->get(); 
        return view('admin.orders.completed', compact('orders')); 
    } 

/*Get Approved Orders*/
    public function cancelled()
    {
        $orders = Order::select('orders.*','users.name','users.email','service_name_english','service_name_arabic')
                 ->join('users','users.id','=','orders.user_id')
                 ->join('services','services.id','=','orders.service_id')
                 ->where('orders.status','4')
                 ->orderBy('orders.id','desc')
                 ->get(); 
        return view('admin.orders.cancelled', compact('orders')); 
    }            
    
/*Order Details*/
    public function details($id)
    {
        $order = Order::select('orders.*','users.name','users.email','service_name_english','service_name_arabic','drivers.name as driver_name','drivers.mobile as driver_mobile')
                 ->join('users','users.id','=','orders.user_id')
                 ->join('services','services.id','=','orders.service_id')
                 ->join('drivers','drivers.id','=','orders.order_delivered_by','left outer')
                 ->where('orders.id',$id)
                 ->first(); 
        $data = [
                   'order' => $order,
                ];
        return view('admin.orders.details', $data);
    }   
}
