@extends('layouting.master')

@section('content')
@include('layouting.search')

<div class="container">
    <div class="row" id="col-barang">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show mb-3 text-center" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col" style="text-align: center;">
            <h1>DETAIL BARANG</h1>
        </div>

        <div class="row" id="wrapper-detail-barang">
            <div class="col-6 mt-5" id="image-barang">
                @php
                $x = explode("|", $barang->image);
                @endphp
                <div class="row me-1">
                    <img src="{{ asset('images/'.$x[0]) }}" alt="" style="width: 93%; height: 315px; margin-bottom: 10px;" id="gambar-utama-detail-barang">
                </div>
                <div id="detail-images-collection">
                    <div id="sliderTrack">
                        @foreach($x as $key => $val)
                        @if($key > 0)
                        <div class="box">
                            <img src="{{asset('images/'.$val)}}" alt="gambar barang">
                        </div>
                        @endif
                        @php
                        $count = $key + 1
                        @endphp
                        @endforeach

                        <!-- @foreach($x as $key => $val)
                        @if($key > 0)
                        <div class="box">
                            <img src="{{asset('images/'.$val)}}" alt="gambar barang">
                        </div>
                        @endif
                        @endforeach -->
                        <input type="hidden" value="{{ $count-1 }}" id="countImages">
                    </div>
                </div>
            </div>

            <div class="col-6" id="detail-barang">
                <input type="hidden" value="{{ $barang->id_barang }}" name="id_barang">
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nama Toko</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $barang->name }}" readonly name="nama_toko">
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nama Barang</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $barang->barang_name }}" readonly name="nama_barang">
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Harga</div>
                    </div>
                    <input type="text" class="form-control" value="RP {{ number_format($barang->harga) }}" readonly name="harga_barang">
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Kategori</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $barang->category_name }}" readonly name="kategori">
                </div>

                <div class="input-group mb-1" id="paragraf-detail-barang">
                    <!-- <textarea  style="padding-left: 15px;" name="detail" id="detail" cols="70" rows="10">
                        {!! $barang->detail !!}
                    </textarea> -->
                    {!! $barang->detail !!}
                </div>

                <div style="margin-top: 15px;" class="btn-wrapper-detail-barang">
                    <button class="btnKurang" id="btn-kurang-barang"><img src="{{ asset('images/icon-minus.png') }}" alt=""></button>
                    <input class="jlhBarang" id="total-barang-beli" type="number" value=1>
                    <button class="btnTambah" id="btn-tambah-barang"><img src="{{ asset('images/icon-plus.png') }}" alt=""></button>
                    <button type="button" class="btn btn-info" id="back-detail-barang-btn"><a href="/">Back</a></button>
                    <a class="btn btn-info btnBeli" id="btn-beli" data-id="{{ $barang->id_barang }}">Beli</a>
                </div>
            </div>
        </div>
        <!-- <div class="mt-1 row">
            <div class="col">
                <button type="button" class="btn btn-primary" id="back-detail-barang-btn"><a href="/">Back</a></button>
            </div>
        </div> -->
    </div>
</div>


<!-- Modal Pembelian barang -->
<div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Pembelian Barang</h3>
            </div>
            <div class="modal-body">
                <form action="/bayar/barang" method="POST" enctype="multipart/form-data" id="form-pembayaran">
                    @csrf
                    <input type="hidden" class="idBarangBeli" id="id_barang_beli" name="id_barang_beli">

                    <div class="mb-3">
                        <label for="barang_name">Nama Toko</label>
                        <input type="text" class="nameTokoBeli" id="name_toko_beli" required name="name_toko_beli" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="barang_name">Nama Barang</label>
                        <input type="text" class="nameBarangBeli" id="barang_name_beli" required name="barang_name_beli" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="barang_name">Kategori</label>
                        <input type="text" class="categoryBeli" id="kategori_beli" required name="kategori_beli" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="barang_name">Harga Barang</label>
                        <input type="text" class="hargaBeli" id="harga_beli" required name="harga_beli" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="barang_name">Jumlah Barang</label>
                        <input type="text" class="jlhBeli" id="jumlah_beli" required name="jumlah_beli" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="barang_name"><b>Total Pembayaran</b></label>
                        <input type="text" class="totalPembayaran" id="total_pembayaran" required name="total_pembayaran" value="" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
        </div>
    </div>
</div>

@endsection