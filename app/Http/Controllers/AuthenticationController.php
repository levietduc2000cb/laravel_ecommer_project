<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash,Auth};

use App\Models\Users;

class AuthenticationController extends Controller
{
    public function register(){
        return view('register');
    }
    public function handleRegister(Request $request){
        $data = $request->all();
        $phone = $request->request->get('phone');
        $res = Users::where('phone',$phone)->first();
        if($res !== null){
            return back()->with("ms_error","Phone number exist!");
        }
        $data['password'] = Hash::make($data['password']);
        $res = Users::create($data);
        if($res){
            return back()->with("msg","User created successfully!");
        }
        return back()->withErrors("ms_error","User created failed!");
    }

    public function login(){
        return view('login');
    }

    public function handleLogin(Request $request){
        $credetials = [
            'phone'=>$request->phone,
            'password'=>$request->password
        ];
        if(Auth::attempt($credetials,$request->keep_login)){
            $isAdmin = Auth::user()->isAdmin;
            if($isAdmin==1){
                return redirect(route('overview'));
            }
            return redirect(route('home'));
        }
        return back()->with('ms_error','Phone or Password is not valid');
    }

    public function handleLogout(){
        Auth::logout();
        return redirect(route('login'));
    }

}
