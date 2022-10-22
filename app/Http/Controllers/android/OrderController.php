<?php

namespace App\Http\Controllers\android;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\android\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class OrderController extends Controller
{
/*PLACE ORDER */
    public function add(Request $request)
    {
        $fields     = $request->input();
        $validator  = Validator::make($request->all(), [
                'address'    => 'required|min:3',
                'pincode'    => 'required|numeric',
                'latitude'   => 'required',
                'longitude'  => 'required',
                'service_id' => 'required|numeric',
                'service_type_id' => 'required|numeric',
                'sub_type_id' => 'nullable',
                'quantity'   => 'required|numeric',
                'flat'       => 'required',
                'total'      => 'required',
                'notes'      => 'nullable|min:3',
            ]);
        if($validator->fails())
        {   
            $errors = collect($validator->errors());
            $res    = sendResponse('false', $data = [], $message = $errors, $code = 422);
        }
        else
        {   
            $service_type = DB::table('service_types')->select('service_type_english','service_type_arabic')->where('id',$fields['service_type_id'])->first();
            $service_type_name= $service_type->service_type_english.'/'.$service_type->service_type_arabic;
            $sub_type = DB::table('service_sub_types')->select('sub_type_name')->where('id',$fields['sub_type_id'])->first(); 
            if($sub_type){
              $sub_type_name = $sub_type->sub_type_name;
            } else {
               $sub_type_name = '';
            }

            $user                      = auth('sanctum')->user();
            $order                     = new Order;
            $order->user_id            = $user->id;
            $order->service_id         = $fields['service_id'];
            $order->quantity           = $fields['quantity'];
            $order->service_type       = $service_type_name;
            $order->sub_type           = $sub_type_name;
            $order->total              = $fields['total'];
            $order->booked_at          = date('Y-m-d H:i:s');
            $order->notes              = $fields['notes'];
            $order->created_at         = date('Y-m-d H:i:s');
            $order->updated_at         = date('Y-m-d H:i:s');
            $result = $order->save();
            if($result) 
            {                     
                   DB::table('order_address')->insert(
                        array(
                            'order_id' => $order->id,
                            'user_id'  => $user->id,
                            'address'    => $fields['address'],
                            'pincode'    => $fields['pincode'],
                            'latitude'   => $fields['latitude'],
                            'longitude'  => $fields['longitude'],
                            'flat'       => $fields['flat'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ));
                $res    = sendResponse('true', 
                                       $data = [], 
                                       $message ='Order placed succesfully.', 
                                       $code = 200);                                            
            }            
            else
            {
                $res    = sendResponse('false', 
                                               $data = [], 
                                               $message ='Failed to place order.', 
                                               $code = 400);
            }
        }
        return $res;
    }
}
