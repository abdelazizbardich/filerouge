@extends('dashboard.layouts.auth')

@section('title', 'Loin')
@section('pageClass','login')

@section('content')
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-auto">
                <h1 class="h3 text-primary text-center mb-5">Admin <i>Login</i></h1>
                <div class="py-3 px-5 border rounded shadow-lg">
                    <form action="{{ url('/login') }}" method="post">
                        <div class="title">
                            <h2 class="text-primary">Login</h2>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="email" class="text-primary">Email</label>
                            <input value="{{ old('email') }}" type="text" class="form-control form-control-lg border-primary" id="emal" name="email" placeholder="Email..." >
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-primary"  >Password</label>
                            <input type="password" class="form-control form-control-lg border-primary" id="emal" name="password" placeholder="Password..." >
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-lg btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
