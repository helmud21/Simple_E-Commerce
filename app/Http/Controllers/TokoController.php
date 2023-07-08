<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TokoController extends Controller
{
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        // dd($id);
        $barangs = DB::table('barangs')->join('categories', 'barangs.category_id', '=', 'categories.id_category')
        ->select('barangs.*', 'categories.*')
        ->where('user_id', $id)
        ->orderBy('id_barang', 'DESC')
        ->paginate(10);
        
        // dd($barangs);

        if ($request->ajax()) {
            return view('loadItems', ['barangs' => $barangs]);
        }

        return view('dashboardToko', compact('barangs'));
    }

    // Digunakan untuk menampilkan data menggunakan datatables
    // public function post()
    // {
    //     $id = auth()->user()->id;
    //     $barang = Barang::select('barangs.*')->where('user_id', $id)->with('category');
    //     return DataTables::eloquent($barang)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($a) {
    //             $btn = '<a data-id="' . $a->id . '" class=" btn btn-warning btn-aksi edit_data" style="width: 90px">Ubah</a> <a data-id="' . $a->id . '" class=" btn btn-danger btn-aksi delete_data" style="width: 90px">Hapus</a>';
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi'])
    // ->make(true);
    // }

    public function editBarang($id)
    {
        $barang = array('id_barang' => $id);
        // $item = Barang::with('category')->where($barang)->first();
        $item = DB::table('barangs')->join('categories', 'barangs.category_id', '=', 'categories.id_category')
        ->select('barangs.*', 'categories.*')
        ->where($barang)->first();

        return response()->json($item);
    }

    public function postBarang(Request $request)
    {
        // dd($request);
        $id = auth()->user()->id;
        // dd($id);
        $harga = $request->harga;
        $harga = str_replace(',', '', $harga);
        $harga = (int)$harga;
        // dd($request);
        $request->validate([
            'barang_name' => 'required',
            'harga' => 'required|gt:0',
            'category' => 'required',
            'detail' => 'required'
        ]);

        $images = array();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move('images/', $name);
                $images[] = $name;
            }
            // dd($files);
        }
        // dd($request->all());
        $barang = Barang::updateOrCreate(['id_barang' => $request->id_barang], [
            'barang_name' => $request->barang_name,
            'harga' => $harga,
            'category_id' => $request->category,
            'detail' => $request->detail,
            'user_id' => $id,
            'image' => implode("|", $images)
        ]);

        return back()->with('success', 'Data berhasil ditambah/diedit');
    }

    public function hapusBarang($id)
    {
        Barang::destroy($id);

        return back();
    }
}
