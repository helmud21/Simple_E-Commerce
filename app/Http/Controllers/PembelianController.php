<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function beliBarang($id)
    {
        if (auth()->user()) {
            $id_user = auth()->user()->id;
            $barang = array('id_barang' => $id);

            $user = User::find($id_user);
            $item = DB::table('barangs')
            ->join('categories', 'barangs.category_id', '=', 'categories.id_category')
            ->select('barangs.*', 'categories.category_name')
            ->where($barang)->first();
            // $item = Barang::with('category')->where($barang)->first();
            $id_toko = $item->user_id;
            $toko = User::find($id_toko);

            return response()->json(array(
                'barang' => $item,
                'toko' => $toko,
            ));
        } 
        else {
            $barang = array('id_barang' => $id);

            
            // $item = Barang::with('category')->where($barang)->first();
            $item = DB::table('barangs')
            ->join('categories', 'barangs.category_id', '=', 'categories.id_category')
            ->select('barangs.*', 'categories.category_name')
            ->where($barang)->first();
            $id_toko = $item->user_id;
            $toko = User::find($id_toko);

            return response()->json(array(
                'barang' => $item,
                'toko' => $toko
            ));
        }
    }

    public function bayarBarang(Request $request) {
        // dd($request);
        if (!auth()->user()){
            return redirect('/login');
        } else {
            $id_user = auth()->user()->id;
            $user = User::find($id_user);
            $saldo = $user->saldo;

            $harga = $request->harga_beli;
            $harga = substr($harga, 4);
            $harga = str_replace(',','', $harga);
            $harga = (int)$harga;
            // dd($harga);

            if($saldo > $harga){
                $saldo = $saldo - $harga;

                User::where('id', $id_user)->update(array('saldo' => $saldo));
                Pembelian::create([
                    'id_pembeli' => $id_user,
                    'nama_toko' => $request->name_toko_beli,
                    'nama_barang' => $request->barang_name_beli,
                    'kategori_barang' => $request->kategori_beli,
                    'harga_barang' => $request->harga_beli,
                    'jlh_barang' => $request->jumlah_beli,
                    'total_harga' => $request->total_pembayaran,
                ]);

                return back()->with('success', 'Selamat pembelian anda berhasil');
            } else {
                return back()->with('failed', 'Maaf jumlah saldo anda tidak mencukupi');
            }
        }
    }

    public function dataPembelian($id) {
        $pembelians = Pembelian::orderBy('id_pembelian', 'DESC')->where('id_pembeli', $id)->get();
        // var_dump($pembelians);
        
        return view('pembelian', compact([
            'pembelians'
        ]));
    }
}
