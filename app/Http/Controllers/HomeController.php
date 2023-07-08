<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index(Request $request) {
        $barangs = DB::table('barangs')
        ->join('users', 'barangs.user_id', '=', 'users.id')
        ->join('provinsis', 'users.provinsi_id', '=', 'provinsis.id_provinsi')
        ->select('barangs.*', 'users.*', 'provinsis.provinsi_name')->get();

        // dd($barangs);
        $kategori = Category::all();
        $short_kategori = $kategori->sortBy('kategori_name', SORT_NATURAL);

        return view('index',compact('barangs', 'short_kategori'));
    }

    public function detailBarang($id) {
        
        $barang = DB::table('barangs')
        ->join('users', 'barangs.user_id', '=', 'users.id')
        ->join('categories', 'barangs.category_id', '=', 'categories.id_category')
        ->select('barangs.*', 'users.*', 'categories.category_name')->where('barangs.id_barang', $id)->first();
        // $barang = Barang::with('user', 'category')->where('barangs.id_barang', $id)->first();

        // dd($barang);

        return view('detail_barang', [
            'barang' => $barang
        ]);
    }

    public function cariBarang(Request $request){
        $keyword = $request->search;
        $kategori = Category::all();
        $short_kategori = $kategori->sortBy('kategori_name', SORT_NATURAL);
        // dd($keyword);
        $barangs = DB::table('barangs')
        ->join('users', 'barangs.user_id', '=', 'users.id')
        ->join('provinsis', 'users.provinsi_id', '=', 'provinsis.id_provinsi')
        ->select('barangs.*', 'users.*', 'provinsis.provinsi_name')
        ->where('users.role', 'Toko')
        ->where('users.name', 'LIKE', "%{$keyword}%")
        ->orWhere('barangs.barang_name', 'LIKE', "%{$keyword}%")
        ->get(); 

        if($barangs != null) {
            return view('index', compact('barangs', 'short_kategori'));
        } else {
            return back()->with('success', 'Maaf data yang anda cari tidak ada');
        }
    }

    public function getSelected (Request $request) {
        // dd ($request);
        
        $id_kategori = $request->categoryHome;
        $kategori = Category::all();
        $short_kategori = $kategori->sortBy('kategori_name', SORT_NATURAL);

        $barangs = DB::table('barangs')
        ->join('users', 'barangs.user_id', '=', 'users.id')
        ->join('provinsis', 'users.provinsi_id', '=', 'provinsis.id_provinsi')
        ->join('categories', 'barangs.category_id', '=', 'categories.id_category')
        ->select('barangs.*', 'users.*', 'provinsis.provinsi_name')
        ->where('users.role', 'Toko')
        ->where('categories.id_category', $id_kategori)->get();

        // dd($barangs);

        return view('index', compact('barangs', 'short_kategori'));
        
    }

    // Gunakan jika ingin menampilkan data menggunakan datatables
    // public function getData() {
    //     $barangs = Barang::select('barangs.*')->with('category');

    //     return DataTables::eloquent($barangs)
    //     ->addColumn('show', function($dataBarang){
    //         $card = '
    //                 <div class = "flex-wrap">
    //                 <div class="card mb-4 d-flex" style="width: 16rem;">
    //                     <img src="'.$dataBarang->image.'" class="card-img-top mt-3" alt="...">
    //                     <div class="card-body">
    //                         <p>'.$dataBarang->barang_name.'</p>
    //                     </div>
    //                     <ul class="list-group list-group-flush">
    //                         <li class="list-group-item">
    //                             <h6>RP '.$dataBarang->harga.'</h6>
    //                         </li>
    //                         <li class="list-group-item">Nama Provinsi</li>
    //                     </ul>
    //                     <div class="card-body d-flex flex-row-reverse">
    //                         <a href="/detail/{{ $barang->id_barang }}" class="card-link" id="detail-btn">Detail</a>
    //                     </div>
    //                 </div>
    //                 </div>';

    //     return $card;
    //     })
    //     ->rawColumns(['show'])
    //     ->make(true);
    // }
}
