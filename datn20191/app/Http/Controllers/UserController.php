<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Session;
use Validator;
use Illuminate\Support\MessageBag;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function Login (Request $request)
    // {
    // 	$email  = $request->email;
    // 	$password = $request->password;
    // 	if(Auth::attempt(['email'=>$email,'password'=>$password])){
    //         $data = ['user_id'=>Auth::User()->id,'email'=>$email,'role_id'=>Auth::User()->role_id];
    //         return response()->json(['code'=>1,'data'=>$data],200);
    //     }else
    //     {
    //         return response()->json(['code'=>0,'message'=>'Email hoặc mật khẩu không chính xác!'],200);
    //     }
    // }
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
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:6'
    	];
    	$messages = [
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    			return redirect()->intended('/dashboard');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
    public function logOut(){
        Auth::logout();
	    return redirect()->route('login');
    }
}
