@extends('layouting.master')

@section('content')
@include('layouting.search')

<div class="container">
    <div class="row" id="col-barang">
        <div class="col" style="text-align: center;">
            <h1>DETAIL BARANG</h1>
        </div>

        <div class="col" id="wrapper-detail-barang">
            <div class="col-6" id="image-barang">
                <img src="" alt="image-barang">
            </div>

            <div class="col-6" id="detail-barang">
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nama Toko</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $barang->name }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nama Barang</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $barang->barang_name }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Harga</div>
                    </div>
                    <input type="text" class="form-control" value="RP {{ $barang->harga }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Kategori</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $barang->ctg }}" disabled>
                </div>

                <div class="input-group mb-1">
                    
                    <textarea style="padding-left: 15px;" name="detail" id="detail" cols="70" rows="10" id="detail">
                        {{ $barang->detail }}
                    </textarea>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection