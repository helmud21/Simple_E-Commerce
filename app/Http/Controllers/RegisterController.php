<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;

class RegisterController extends Controller
{
    public function index() {
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $short_provinsi = $provinsi->sortBy('name', SORT_NATURAL);
        $short_kabupaten = $kabupaten->sortBy('name', SORT_NATURAL);
        return view('pendaftaran/user', [
            'short_provinsi' => $short_provinsi,
            'short_kabupaten' => $short_kabupaten
        ]);
    }

    public function userCreate(Request $request) {
        // dd($request->all());
        $validatedData = $request -> validate ([
            'name' => 'required|max:255',
            'phone_number' => 'required|Integer|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'jalan' => 'required|min:10'
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }
}
