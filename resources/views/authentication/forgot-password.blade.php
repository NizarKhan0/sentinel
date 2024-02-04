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
                                            <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                                        </div>

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form action="/forgot-password" method="post">
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
                                                    <input type="submit" value="Send Code"
                                                        class="btn btn-primary btn-block">
                                                </div>
                                                <hr>
                                            </form>
                                        </form>
                                        <hr>
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
