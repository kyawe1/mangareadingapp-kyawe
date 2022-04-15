<?php

namespace App\Http\Controllers\BasicControllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(){
        return View('basic.auth.Login');
    }
    public function Register(){
        return View('basic.auth.Register');
    }

    public function Logout(){
        auth()->logout();
        return redirect()->route('basic.home');
    }
    public function register_process(){
       
        $validated_user=request()->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|string',
            'confirm_password'=>'required|min:8|same:password|string'
        ]);
        $validated_user["password"]=Hash::make($validated_user['password']);
        unset($validated_user['confirm_password']);
        User::create($validated_user);
        return redirect()->route("auth.login-form")->with("success","Account created successfully");
    }
    public function login_process(){
        $validated_user=request()->validate([
            'email'=>"required|email",
            'password'=>"required|min:8|string"
        ]);
        if(Auth::attempt($validated_user)){
            return redirect()->route("basic.home");
        }
        return redirect()->route("auth.login-form")->with("error","Invalid credentials");
    }
}
