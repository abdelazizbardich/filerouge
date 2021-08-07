@extends('dashboard.layouts.auth')

@section('title', 'Loin')
@section('pageClass','login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <form action="{{ url('/login') }}" method="post">
                        <div class="title">
                            <h2>Login</h2>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{ old('email') }}" type="text" class="form-control" id="emal" name="email" placeholder="Email..." >
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="emal" name="password" placeholder="Password..." >
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
