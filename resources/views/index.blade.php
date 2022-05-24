@extends('layouting.master')

@section('content')
@include('layouting.search')

<div class="container">
    <div class="row d-flex justify-content-between mt-4" id="product-list">
        @foreach ($barangs as $barang)
        <!-- @if($barang->role == 'Toko') -->
        <div class="card mb-4 d-flex" style="width: 16rem;">
            <img src="{{ $barang->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <p>{{ $barang->barang_name }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6>RP {{ $barang->harga }}</h6>
                </li>
                <li class="list-group-item">Lokasi Toko</li>
            </ul>
            <div class="card-body d-flex flex-row-reverse">
                <a href="/detail/{{ $barang->id_barang }}" class="card-link" id="detail-btn">Detail</a>
            </div>
        </div>
        <!-- @endif -->
        @endforeach
    </div>
    <div class="col-1">
        {{ $barangs->links() }}
    </div>
</div>

@endsection

