<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login_page/login');
    }

    public function login(Request $request) {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/login');
        }
        return redirect('/');
    }
}
