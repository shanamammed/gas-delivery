<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Service;
use App\Models\admin\ServiceType;
use App\Models\admin\ServiceSubType;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

/*Get Services*/
    public function index()
    {
        $services = Service::all()->sortByDesc("id");; 
        return view('admin.services.view', compact('services')); 
    }

/*Add view page*/
    public function add()
    {
         return view('admin.services.add');
    }

/*Create Service*/
    public function addService(Request $request)
    {
        $fields    = $request->input();
        $validator = Validator::make($request->all(),
            [
                'service_name_arabic' => 'required|min:3|max:200',
                'service_name_english' => 'required|min:3|max:200',
            ],
            [
                'service_name_arabic.required' => 'Please enter the service name in Arabic',
                'service_name_english.required'=> 'Please enter the service name in English',
            ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors());
            return $errors;
        } else {
            $service = new Service;
            $service->service_name_arabic  = $fields['service_name_arabic'];
            $service->service_name_english = $fields['service_name_english'];
            if($service->save()) {
                if($request->input('values')) {
                    $count     = sizeof($request->input('values'));
                    for ($i=1;$i <=$count; $i++) 
                    {
                       $service_type_english = $_POST['service_types_english'.$i];
                       $service_type_arabic  = $_POST['service_types_arabic'.$i];
                       $size        = $_POST['size'.$i];
                       $single_price= $_POST['single_price'.$i];
                       $types       = $_POST['unit'.$i];
                       $price       = $_POST['price'.$i];
                      
                       $j=0;
                       foreach($service_type_english as $ser)
                       {
                              $service_type = new ServiceType;
                              $service_type->service_id = $service->id;
                              $service_type->service_type_english = $ser;
                              $service_type->service_type_arabic  = $service_type_arabic[$j];
                              if($size[$j]=='yes') { $service_type->has_sub_type = 1;
                              } else { $service_type->has_sub_type = 0; } 
                              if($single_price[$j]) { $service_type->price = $single_price[$j]; } else { $service_type->price = 0;}                             
                              if($service_type->save()) {
                                if(!$single_price[$j])  {
                                  $k=0;
                                  foreach($types as $type)
                                  {
                                      DB::table('service_sub_types')->insert([   
                                                  'service_id'      => $service->id,
                                                  'service_type_id' => $service_type->id,
                                                  'sub_type_name'   => $type,
                                                  'price'           => $price[$k],
                                               ]);
                                      $k++;
                                  }
                                  
                                }  
                           } 
                           $j++;
                        }                        
                    }              
              }         
              $service_type_english = $_POST['service_types_english'];
              $service_type_arabic  = $_POST['service_types_arabic'];
              $size = $_POST['size'];
              $single_price= $_POST['single_price'];
              $types   = $_POST['unit'];
              $price   = $_POST['price'];
              
              $j=0;
              foreach($service_type_english as $ser)
              {
                  $service_type = new ServiceType;
                  $service_type->service_id = $service->id;
                  $service_type->service_type_english = $ser;
                  $service_type->service_type_arabic  = $service_type_arabic[$j];
                  if($size[$j]=='yes') {
                    $service_type->has_sub_type = 1;
                  } else {
                    $service_type->has_sub_type = 0;
                  }  
                  if($single_price[$j]) { $service_type->price = $single_price[$j]; } else { $service_type->price = 0;}
                  if($service_type->save()) {
                    if(!$single_price[$j]) {
                          $k=0;
                          foreach($types as $type)
                          {
                             DB::table('service_sub_types')->insert([   
                                  'service_id'      => $service->id,
                                  'service_type_id' => $service_type->id,
                                  'sub_type_name'   => $type,
                                  'price'           => $price[$k],
                               ]);
                              $k++;
                          }
                          // return $type_array;
                     }     
                   }  
                   $j++;
              }      
                    
                \Session::put('success','Service added successfully!!');
                 return redirect()->route('services');
            } else {
                return back()->with('error','Failed to add service.');
            }   
            // return $fields; 
        }
    }

/*Update Service*/
    public function updateService(Request $request)
    {
        $fields    = $request->input();
        $validator = Validator::make($request->all(),
            [
                'service_id'           => 'required|numeric',
                'service_name_arabic'  => 'required|min:3|max:200',
                'service_name_english' => 'required|min:3|max:200',
            ],
            [
                'service_name_arabic.required' => 'Please enter the service name in Arabic',
                'service_name_english.required'=> 'Please enter the service name in English',
            ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors());
            return $errors;
        } else {
            $service = Service::find($fields['service_id']);
            $service->service_name_arabic  = $fields['service_name_arabic'];
            $service->service_name_english = $fields['service_name_english'];
            if($service->save()) {
                ServiceType::where('service_id',$fields['service_id'])->delete();
                ServiceSubType::where('service_id',$fields['service_id'])->delete();
                if($request->input('values')) {
                    $count     = sizeof($request->input('values'));
                    for ($i=1;$i <=$count; $i++) 
                    {
                       $service_type_english = $_POST['service_types_english'.$i];
                       $service_type_arabic  = $_POST['service_types_arabic'.$i];
                       $size        = $_POST['size'.$i];
                       $single_price= $_POST['single_price'.$i];
                       $types       = $_POST['unit'.$i];
                       $price       = $_POST['price'.$i];
                      
                       $j=0;
                       foreach($service_type_english as $ser)
                       {
                              $service_type = new ServiceType;
                              $service_type->service_id = $fields['service_id'];
                              $service_type->service_type_english = $ser;
                              $service_type->service_type_arabic  = $service_type_arabic[$j];
                              if($size[$j]=='yes') { $service_type->has_sub_type = 1;
                              } else { $service_type->has_sub_type = 0; } 
                              if($single_price[$j]) { $service_type->price = $single_price[$j]; } else { $service_type->price = 0;}                             
                              if($service_type->save()) {
                                if($size[$j]=='yes')  {
                                  $k=0;
                                  foreach($types as $type)
                                  {
                                      DB::table('service_sub_types')->insert([   
                                                  'service_id'      => $fields['service_id'],
                                                  'service_type_id' => $service_type->id,
                                                  'sub_type_name'   => $type,
                                                  'price'           => $price[$k],
                                               ]);
                                      $k++;
                                  }
                                }  
                           } 
                           $j++;
                        }                        
                    }              
              }         
                \Session::put('success','Service added successfully!!');
                 return redirect()->route('services');
            } else {
                return back()->with('error','Failed to add service.');
            }   
            return $fields; 
        }
    }

/*Edit view page*/
    public function edit($id)
    {
        $service = Service::find($id);
        $service_types = ServiceType::where('service_id',$id)->get();
        foreach($service_types as $type)
        {
            $type->sub_types = ServiceSubType::where('service_type_id',$type->id)->get();
        }
        $data = [
                   'service' => $service,
                   'service_types' => $service_types 
                ];
        return view('admin.services.edit', $data);
    }

/*Details view page*/    
    public function details($id)
    {
        $service = Service::find($id);
        $service_types = ServiceType::where('service_id',$id)->get();
        foreach($service_types as $type)
        {
            $type->sub_types = ServiceSubType::where('service_type_id',$type->id)->get();
        }
        $data = [
                   'service' => $service,
                   'service_types' => $service_types 
                ];
        return view('admin.services.details', $data);
    }

/*Delete data*/
     public function delete($id)
     {
        $service = Service::find($id);
        $service->delete();
 
        return redirect('/admin/services')->with('success', 'Service removed.');  
    } 
}
