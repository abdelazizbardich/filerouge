<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Luxy-style</title>
    <meta name="theme-color" content="#4565d2">
    <meta name="twitter:image" content="http://127.0.0.1:8000/{{  asset('assets/img/dashboard/logo gold.png')  }}">
    <meta property="og:type" content="website">
    <meta name="description" content="E-commerce cache-on-delivery website">
    <meta property="og:image" content="http://127.0.0.1:8000/{{  asset('assets/img/dashboard/logo gold.png')  }}">
    <link rel="icon" type="image/png" sizes="182x170" href="{{  asset('assets/img/dashboard/logo%20gold.png')  }}">
    <link rel="icon" type="image/png" sizes="182x170" href="{{  asset('assets/img/dashboard/logo%20gold.png')  }}">
    <link rel="icon" type="image/png" sizes="182x170" href="{{  asset('assets/img/dashboard/logo%20gold.png')  }}">
    <link rel="icon" type="image/png" sizes="182x170" href="{{  asset('assets/img/dashboard/logo%20gold.png')  }}">
    <link rel="icon" type="image/png" sizes="182x170" href="{{  asset('assets/img/dashboard/logo%20gold.png')  }}">
    <link rel="stylesheet" href="{{  asset('assets/bootstrap/css/bootstrap.min.css')  }}">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{  asset('assets/fonts/fontawesome-all.min.css')  }}">
    <link rel="stylesheet" href="{{  asset('assets/fonts/font-awesome.min.css')  }}">
    <link rel="stylesheet" href="{{  asset('assets/fonts/fontawesome5-overrides.min.css')  }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{  asset('assets/css/dashboard/main.css')  }}">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-light sticky-top shadow-lg align-items-start sidebar sidebar-dark accordion p-0 toggled" style="height: 100vh;background: #00114b;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ url('/dashboard') }}">
                    <div class="sidebar-brand-icon rotate-n-15"><img class="img-fluid" src="{{  asset('assets/img/dashboard/logo%20gold.png')  }}"></div>
                    <div class="sidebar-brand-text mx-3"><span>{{ config('app.name') }}</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav" id="accordionSidebar" style="margin-top: 64px;">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt" style="margin-right: 15px;"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard/product') }}"><i class="fa fa-inbox" style="margin-right: 15px;"></i><span>Products</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard/categories') }}"><i class="fa fa-th" style="margin-right: 15px;"></i><span>Categories</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard/material') }}"><i class="fa fa-tint" style="margin-right: 15px;"></i><span>Materials</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard/order') }}"><i class="fa fa-cart-arrow-down" style="margin-right: 15px;"></i><span>Orders</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard/user') }}"><i class="fa fa-users" style="margin-right: 15px;"></i><span>Users</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn btn-primary rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand sticky-top shadow-lg mb-4 topbar static-top" style="background: #00114b;">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about')}}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/shop')}}"> Shop</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact')}}"> Contact</a></li>
                        </ul>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="text-white d-none d-lg-inline mr-2 small">{{-- ValerieLuna --}}</span><img class="rounded-circle img-profile" src="{{  asset('assets/img/dashboard/avatars/avatar-icon-images-4.jpg')  }}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="{{ url('/dashboard/profile') }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ url('/dashboard/logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger" style="color: var(--red);"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    {{-- Content --}}
                    @yield('content')
                </div>
    </div>
    <footer class="sticky-footer" style="background: #00114b;">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Luxy-style 2021</span></div>
        </div>
    </footer>
</div><a class="bg-success border rounded-circle d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="{{  asset('assets/js/jquery.min.js')  }}"></script>
<script src="{{  asset('assets/bootstrap/js/bootstrap.min.js')  }}"></script>
<script src="{{  asset('assets/js/chart.min.js')  }}"></script>
<script src="{{  asset('assets/js/bs-init.js')  }}"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{  asset('assets/js/dashboard/main.js')  }}"></script>
<script src="{{  asset('assets/js/dashboard/theme.js')  }}"></script>
</body>

</html>
