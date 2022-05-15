<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($id) {

        $user = User::with('provinsi','kabupaten')->where('id', $id)->first();
        return view('profile', [
            'user' => $user
        ]);
    }

    public function edit($id) {
        
    }
}
