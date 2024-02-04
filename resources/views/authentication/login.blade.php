@extends('layouts.master')

@section('title', 'Login')

@section('content')

    <body class="bg-gradient-login">
        <!-- Login Content -->
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        </div>

                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form action="/login" method="post">
                                            @csrf
                                            <form class="user">
                                                {{-- <div class="form-group">
                                                <input type="email" class="form-control" id="exampleInputEmail"
                                                    aria-describedby="emailHelp" placeholder="Enter Email Address">
                                            </div> --}}
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        Remember me
                                                        <input type="checkbox" name="remember_me">
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group">
                                                <div class="custom-control custom-checkbox small"
                                                    style="line-height: 1.5rem;">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div> --}}
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                                </div>
                                                <div class="form-group">
                                                    <a href="/forgot-password" class="btn btn-danger btn-block">Forgot
                                                        password</a>
                                                </div>
                                                <hr>
                                                <a href="#" class="btn btn-google btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                                </a>
                                                <a href="#" class="btn btn-facebook btn-block">
                                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                                </a>
                                            </form>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="font-weight-bold small" href="register">Create an
                                                Account!</a>
                                        </div>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
