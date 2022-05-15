@extends ('layouting.master')

@section('content')

<div class="container">
    <form action="/profile/edit/{{ auth()->user()->id }}" method="POST" id="form-profile">
        <div class="row" id="profile-wrapper">
            <div class="col-4">
                <div id="photo-profile">
                    <img src="{{asset('images/icon-user.png')}}" alt="icon-user">
                    <div id="input-file-btn">
                        <label for="file-upload" class="custom-file-upload">
                            <img src="{{asset('images/camera.png')}}" alt="">
                        </label>
                        <input type="file" id="file-upload">
                    </div>
                </div>
            </div>
            <div class="col-6" id="profile-datas">
                <div class="card" style="width: 34rem;">
                    <h1>PROFILE</h1>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Name</div>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Email</div>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->email }}">
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Phone Number</div>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->phone_number }}">
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Provinsi</div>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->provinsi->name }}">
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Kabupaten</div>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->kabupaten->name }}">
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Kota/Jalan</div>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->jalan }}">
                    </div>
                </div>
            </div>
            <div class="row" id="group-btn-profile">
                <button type="submit" class="btn btn-primary" id="submit-user-regis-btn">Edit</button>
                <button type="button" class="btn btn-primary" id="back-user-regis-btn"><a href="/">Back</a></button>
            </div>
        </div>
    </form>
</div>

@endsection