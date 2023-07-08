@extends ('layouting.master')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col">
      <h1 style="margin-bottom: 10px; text-align: center;">Tabel Pembelian</h1>
      <table class="table" id="tabel-pembelian">
        <thead>
          <tr>
            <th scope="col">Nama Toko</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Kategori Barang</th>
            <th scope="col">Harga Barang</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Waktu Pembelian</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pembelians as $pembelian)
          <tr>
            <td>{{ $pembelian->nama_toko }}</td>
            <td>{{ $pembelian->nama_barang }}</td>
            <td>{{ $pembelian->kategori_barang }}</td>
            <td>{{ $pembelian->harga_barang }}</td>
            <td>{{ $pembelian->jlh_barang }}</td>
            <td>{{ $pembelian->total_harga }}</td>
            <td>{{ date('d-m-Y H:i:s', strtotime($pembelian->created_at)) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection