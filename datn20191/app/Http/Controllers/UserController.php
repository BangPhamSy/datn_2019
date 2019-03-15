<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Session;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login (Request $request)
    {
    	$email  = $request->email;
    	$password = $request->password;
    	if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $data = ['user_id'=>Auth::User()->id,'email'=>$email,'role_id'=>Auth::User()->role_id];
            return response()->json(['code'=>1,'data'=>$data],200);
        }else
        {
            return response()->json(['code'=>0,'message'=>'Email hoặc mật khẩu không chính xác!'],200);
        }
    }
    public function createAccount( Request $request)
    {
    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
    	$user->role_id = $request->role_id;
    	$success = $user->save();
    	if($success) return  "Create Successfully";
    	return "Create Error";

    }
}
