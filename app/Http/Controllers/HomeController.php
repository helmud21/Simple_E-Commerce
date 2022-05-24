<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        // $barang = Barang::paginate(16);
        $barang = DB::table('barangs')->join('users', 'barangs.user_id', '=', 'users.id')->select('barangs.*', 'users.*')->where('users.role', 'Toko')->paginate(16);
        // dd($barang);
        return view('index',['barangs'=>$barang]);
    }

    public function detailBarang($id) {
        
        $barang = DB::table('barangs')
        ->join('users', 'barangs.user_id', '=', 'users.id')
        ->join('categories', 'barangs.category_id', '=', 'categories.id_category')
        ->select('barangs.*', 'users.*', 'categories.category_name as ctg')->where('barangs.id_barang', $id)->first();
        // dd($barang);
        return view('detail_barang', [
            'barang' => $barang
        ]);
    }
}
