@extends('layouting.master')

@section('content')
<div class="row" id="shop-regis">
    <div class="col-6" id="form-shop-regis">
        <form action="/shop/create" method="POST">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="name" class="form-label">Name of Shop</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phone_number">
            </div>

            <div class="mt-5">
                <select name="provinsi" class="form-select" aria-label="Default select example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <option selected disabled>Provinsi</option>
                    @foreach($short_provinsi as $provinsi)
                        <option value="{{ $provinsi->id }}"> {{ $provinsi->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5 mb-4">
                <select name="kabupaten" class="form-select" aria-label="Default select example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <option selected disabled>Kabupaten</option>
                    @foreach($short_kabupaten as $kabupaten)
                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jalan" class="form-label">Kota/Jalan</label>
                <input type="text" class="form-control" id="jalan" name="jalan">
            </div>

            <button type="submit" class="btn btn-primary" id="submit-shop-regis-btn">Submit</button>
        </form>
        <button class="btn btn-primary" id="back-shop-regis-btn"><a href="/register">Kembali</a></button>
    </div>
</div>

@endsection