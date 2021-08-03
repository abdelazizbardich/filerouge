<!DOCTYPE html />
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('/css/dashboard/main.css') }}">
</head>
<body class="@yield('pageClass')">
    <header class="main-header">
        <div class="links">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="profile-drop">
            <img src="{{ asset('img/dashboard/avatar.png') }}" alt="">
            <div class="dropdown">Abdelaziz Bardich <i class="fa fa-sort-down"></i></div>
        </div>
        <div class="notification">
            <i class="fa fa-bell"></i>
            <span>0</span>
        </div>
    </header>
    <div class="side-bar">
        <div class="logo">
            <img src="{{ asset('img/dashboard/logo.png') }}" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ url('/dashboard/product') }}"><i class="fa fa-box-open"></i> Products</a></li>
                <li><a href="{{ url('/dashboard/categories') }}"><i class="fa fa-th"></i> Categories</a></li>
                {{-- <li><a href="{{ url('/dashboard/medias') }}"><i class="fa fa-photo-video"></i> Medias</a></li> --}}
                <li><a href="{{ url('/dashboard/material') }}"><i class="fa fa-bong"></i> Materials</a></li>
                <li><a href="{{ url('/dashboard/orders') }}"><i class="fa fa-luggage-cart"></i> Orders</a></li>
                <li><a href="{{ url('/dashboard/user') }}"><i class="fa fa-users"></i> Users</a></li>
            </ul>
        </div>
    </div>
    <div class="wrapper">
        @yield('content')
    </div>
    <script src="{{ asset('/js/dashboard/main.js') }}"></script>
</body>
</html>
