@extends('layouting.master')

@section('content')
<div class="container">
    <div class="row" id="wrapper-form-login">

        <div class="col-5" id="form-login">



            <section>
                <div class="color"></div>
                <div class="color"></div>
                <div class="color"></div>
                <div class="color"></div>

                <div class="box">
                    <div class="square" style="--i:0;"></div>
                    <div class="square" style="--i:1;"></div>
                    <div class="square" style="--i:2;"></div>
                    <div class="square" style="--i:3;"></div>
                    <div class="square" style="--i:4;"></div>

                    <div class="Container">
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
                            {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="Form">
                            <h1>Login Form</h1>
                            <form action="/post/login" method="POST">
                                @csrf
                                <div class="inputBox">
                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                </div>

                                <div class="inputBox">
                                    <input type="password" name="password" placeholder="Password">
                                </div>

                                <div class="loginButtons">
                                    <button type="submit" id="submit-user-regis-btn">Login</button>
                                    <button type="button" id="back-login-btn"><a href="/">Back</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection


    <!-- <h1>LOGIN</h1>
            <div class="col-10 mx-auto">
                <form action="/post/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div id="btn-group-user">
                        <button type="submit" class="btn btn-primary" id="submit-user-regis-btn">Login</button>
                        <button type="button" class="btn btn-primary" id="back-user-regis-btn"><a href="/">Back</a></button>
                    </div>
                </form>
            </div> -->