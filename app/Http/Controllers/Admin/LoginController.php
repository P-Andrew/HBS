<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function create()
    {

        return view('Admin.login');
    }

    public function login(Request$request)
    {

            if(Auth::guard()->attempt(['name'=>$request['username'],'password'=>$request['password']],$request['remember'])){
                 return redirect()->route('index');
            }else{
                return back()->with('msg','账号或密码错误');
            }
    }

    public function loginOut()
    {
        Auth::guard()->logout();
        return redirect()->route('admin');
    }
}
