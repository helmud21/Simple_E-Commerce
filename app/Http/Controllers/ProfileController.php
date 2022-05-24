<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;

class ProfileController extends Controller
{
    public function index($id) {
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $short_provinsi = $provinsi->sortBy('name', SORT_NATURAL);
        $short_kabupaten = $kabupaten->sortBy('name', SORT_NATURAL);

        $user = User::with('provinsi','kabupaten')->where('id', $id)->first();
        return view('profile', [
            'user' => $user,
            'short_provinsi' => $short_provinsi,
            'short_kabupaten' => $short_kabupaten
        ]);
    }

    public function update(Request $request,$id) {
        $user = User::find($id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->provinsi_id = $request->input('provinsi_id');
        $user->kabupaten_id = $request->input('kabupaten_id');
        $user->jalan = $request->input('jalan');
        // dd($user);

        if($request->hasFile('photo')) {
            $request->file('photo')->move('images/', $request->file('photo')->getClientOriginalName());
            $user->photo = $request->file('photo')->getClientOriginalName();
        }
        // dd($user);
        $user->save();
        return redirect()->route('profile', ['id' => $user->id])->with('success', 'Data berhasil diupdate');
    }
}
