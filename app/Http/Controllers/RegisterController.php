<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Shop;

class RegisterController extends Controller
{
    public function index() {
        return view('pendaftaran/user');
    }

    public function userCreate(Request $request) {
        User::create($request->all());
        return redirect('/');
    }

    public function createShop() {
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $short_provinsi = $provinsi->sortBy('name', SORT_NATURAL);
        $short_kabupaten = $kabupaten->sortBy('name', SORT_NATURAL);
        return view('pendaftaran/shop', [
            'short_provinsi' => $short_provinsi,
            'short_kabupaten' => $short_kabupaten
        ]);
    }

    public function shopInsert(Request $request) {
        Shop::create($request->all());
        return redirect('/');
    }
}
