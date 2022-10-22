<?php

namespace App\Http\Controllers;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            
            \Session::put('success','You are Login successfully!!');
            return redirect()->route('dashboard');
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        // \Sessioin::put('success','You are logout successfully');        
        return redirect(route('adminLogin'));
    }

    /*User Login*/
    public function user(Request $request)
    {
        $fields    = $request->input();
        $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Please enter the email id or mobile number.',
                'password.required' => 'Please enter the password.',
            ]
        );
        if ($validator->fails()) 
        {
            $errors = collect($validator->errors());
            $res = sendResponse('false', $data = [], $message = $errors, $code = 422);
        } 
        else 
        {
            $username = $fields['username'];
            $user     = new User;
            $check    = User::where('email', $username)->where('user_type', '2')->first();
            if ($check) {
                   if(Hash::check($fields['password'], $check->password))
                    {
                        if($check->status=='1') 
                        {
                            $user_details = DB::table('users')->select('id','name','email')->where('user_type','2')->where('id', $check->id)->first();
                            /* Create Token */
                            $token = $check->createToken('my-app-token')->plainTextToken;
                            $user_details->token = $token;

                            $res = sendResponse('true', $data = $user_details, $message = 'You have logged in successfully.', $code = 200);

                        } else {
                            $res = sendResponse('false', $data = [], $message = 'Your account has been blocked by admin.', $code = 400);
                        }
                    } else {
                        $res = sendResponse('false', $data = [], $message = ['password' => ['Invalid pasword']], $code = 422);
                    }    
            } else {
                $res = sendResponse('false', $data = [], $message = ['email' => ['Invalid email address.']], $code = 422);
            }
        }
        return $res;
    }
}
