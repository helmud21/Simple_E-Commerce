@extends ('layouting.master')

@section('content')

<div class="row" id="user-regis">
    <div class="col-6" id="form-user-regis">
        <form action="/user/create" method="POST">
            {{ csrf_field() }}
        <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="exampleInputPassword1" name="phone_number">
            </div>
            <button type="submit" class="btn btn-primary" id="submit-user-regis-btn">Submit</button>
        </form>
        <button class="btn btn-primary" id="back-user-regis-btn"><a href="/">Kembali</a></button>
        <p>Ingin mendaftarkan toko anda? Silahkan klik <a href="/registertoko">di sini!</a></p>
    </div>
</div>

@endsection