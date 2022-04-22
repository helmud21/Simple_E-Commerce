@extends('layouting.master')

@section('content')
<div class="row d-flex justify-content-between mt-4" id="product-list">
        @foreach ($barangs as $barang)
        <div class="card mb-4 d-flex" style="width: 16rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p>{{ $barang->name }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h6>RP {{ $barang->harga }}</h6></li>
                <li class="list-group-item">Lokasi Toko</li>
            </ul>
            <div class="card-body d-flex flex-row-reverse">
                <a href="#" class="card-link" id="detail-btn">Detail</a>
            </div>
        </div>
        @endforeach
</div>
@endsection