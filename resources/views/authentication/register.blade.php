@extends('layouts.master')

@section('title', 'Register')

@section('content')

    <body class="bg-gradient-login">

        <!-- Register Content -->
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">

                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif


                                        @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif

                                        <form action="/register" method="post">
                                            @csrf
                                            <form>
                                                {{-- <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="fname" class="form-control"
                                                id="exampleInputFirstName" placeholder="Enter First Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" class="form-control"
                                                id="exampleInputLastName" placeholder="Enter Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address">
                                        </div> --}}
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" class="form-control"
                                                        id="first_name" placeholder="first_name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        id="last_name" placeholder="last_name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input type="text" name="location" class="form-control"
                                                        id="location" placeholder="location">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control"
                                                        id="password_confirmation" placeholder="password_confirmation">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">Register</button>
                                                </div>
                                                <hr>
                                                <a href="#" class="btn btn-google btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                                </a>
                                                <a href="#" class="btn btn-facebook btn-block">
                                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                                </a>
                                            </form>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="font-weight-bold small" href="login">Already have an account?</a>
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
