<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login_page/login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|'
        ]);

        $email = $validatedData['email'];

        $user = DB::table('users')->select()->where('email', $email)->first();
        if($user == NULL) {
            return redirect('/register')->with('failed', 'Anda belum terdaftar silahkan daftar terlebih dahulu.');
        }
        
        if ($user->role == 'Pembeli') {
            if (Auth::attempt($validatedData)) {
                $request->session()->regenerate();
                return redirect()->intended('/login')->with('failed', 'Wrong email or password');
            }

            return back()->with('failed', 'Wrong email or password');
        } elseif ($user->role == 'Toko') {
            if (Auth::attempt($validatedData)) {
                $request->session()->regenerate();
                return redirect()->intended('/login');
            }

            return back()->with('failed', 'Wrong email or password');
        } else {
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
