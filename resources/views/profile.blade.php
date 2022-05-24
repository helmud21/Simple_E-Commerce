@extends ('layouting.master')

@section('content')

<div class="container">
    <div class="row mt-3" id="update-session-wrapper">
        <div class="col-6">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <div class="row" id="profile-wrapper">
        <div class="col-4">
            <div id="photo-profile">
                <img src="{{asset('images/'.$user->photo)}}" alt="icon-user">
            </div>
        </div>

        <div class="col-6" id="profile-datas">
            <div class="card" style="width: 34rem;">
                <h1>PROFILE</h1>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Name</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Email</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Phone Number</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->phone_number }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Provinsi</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->provinsi->name }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Kabupaten</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->kabupaten->name }}" disabled>
                </div>

                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Kota/Jalan</div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->jalan }}" disabled>
                </div>
            </div>
        </div>
        <div class="col" id="group-btn-profile">
            <button type="submit" class="btn btn-primary" id="submit-user-regis-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
            <button type="button" class="btn btn-primary" id="back-user-regis-btn"><a href="/">Back</a></button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/profile/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo Profile</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label @error('password') is-invalid @enderror">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label @error('phone_number') is-invalid @enderror">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <select name="provinsi_id" class="form-select @error('provinsi') is-invalid @enderror" aria-label="Default select example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected disabled>Provinsi</option>
                            @foreach($short_provinsi as $provinsi)
                            <option value="{{ $provinsi->id }}" {{ $user->provinsi_id == $provinsi->id ? 'selected' : '' }}> {{ $provinsi->name }} </option>
                            @endforeach
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mt-5 mb-4">
                        <select name="kabupaten_id" class="form-select @error('kabupaten') is-invalid @enderror" aria-label="Default select example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected disabled>Kabupaten</option>
                            @foreach($short_kabupaten as $kabupaten)
                            <option value="{{ $kabupaten->id }}" {{ $user->kabupaten_id == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->name }}</option>
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
                        <input type="text" class="form-control @error('jalan') is-invalid @enderror" id="jalan" name="jalan" value="{{ $user->jalan }}">
                        @error('jalan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection