@extends('layouting.master')

@section('content')
<div class="container">
    <div class="row" id="shop-regis">
        <div class="col-6" id="form-shop-regis">
            <h1 id="header-shop-regis">REGISTER FORM</h1>
            <form action="/shop/create" method="POST">
                @csrf
                <input type="hidden" id="role_toko" name="role">
                <div class="mb-3">
                    <label for="name" class="form-label">Name of Shop</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phoneNumber" name="phone_number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-5">
                    <select name="provinsi" class="form-select @error('provinsi') is-invalid @enderror" aria-label="Default select example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option selected disabled>Provinsi</option>
                        @foreach($short_provinsi as $provinsi)
                        <option value="{{ $provinsi->id }}"> {{ $provinsi->name }} </option>
                        @endforeach
                    </select>
                    @error('provinsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-5 mb-4">
                    <select name="kabupaten" class="form-select @error('kabupaten') is-invalid @enderror" aria-label="Default select example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option selected disabled>Kabupaten</option>
                        @foreach($short_kabupaten as $kabupaten)
                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                        @endforeach
                    </select>
                    @error('kabupaten')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jalan" class="form-label">Kota/Jalan</label>
                    <input type="text" class="form-control @error('jalan') is-invalid @enderror" id="jalan" name="jalan" value="{{ old('jalan') }}">
                    @error('jalan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div id="btn-group-shop">
                    <button type="submit" class="btn btn-primary" id="submit-shop-regis-btn" onclick="shopRole()">Submit</button>
                    <button class="btn btn-primary" id="back-shop-regis-btn"><a href="/register">Back</a></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection