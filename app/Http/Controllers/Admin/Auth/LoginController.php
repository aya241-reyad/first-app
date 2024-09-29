<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login(){
        return view("auth.login");
    }

     public function doLogin(LoginRequest $request)
    {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){
    return redirect()->route('categories.index')->with(
            'success',
            'log in Successfully'
            );
        }

    return redirect()->route('login');
}

public function logout(){
    Session::flush();
    Auth::logout();
    return redirect('/login');

    }
}
