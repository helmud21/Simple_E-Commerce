<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('pendaftaran/user');
    }

    public function create(Request $request) {
        User::create($request->all());
        return redirect('/');
    }
}
