@extends('dashboard.layouts.master')

@section('title', 'Products')
@section('pageClass','products-page')

@section('content')
    <span class="title">@yield('title'): <a href="{{ url('/dashboard/product/add') }}" class="action">Add product</a></span>
    <div class="content">
        <div class="categories">
            <ul>
                <li class="active"><a href="#">Body Skin</a></li>
                <li><a href="#">Body Skin</a></li>
                <li><a href="#">Body Skin</a></li>
                <li><a href="#">Body Skin</a></li>
                <li><a href="#">Body Skin</a></li>
                <li><a href="#">Body Skin</a></li>
            </ul>
        </div>
        <div class="products">
            <div>
                <a href="#">
                    <div class="product">
                        <div>
                         <div class="thumbnail">
                             <img src="https://i.pinimg.com/originals/02/54/40/025440523efce9c28dc4d4a3af42b326.png" alt="">
                         </div>
                         <div class="name">
                             <span>dfcsdfsdf</span>
                         </div>
                        </div>
                     </div>
                </a>
                <a href="#">
                    <div class="product">
                        <div>
                         <div class="thumbnail">
                             <img src="https://i.pinimg.com/originals/02/54/40/025440523efce9c28dc4d4a3af42b326.png" alt="">
                         </div>
                         <div class="name">
                             <span>dfcsdfsdf</span>
                         </div>
                        </div>
                     </div>
                </a>
                <a href="#">
                    <div class="product">
                        <div>
                         <div class="thumbnail">
                             <img src="https://i.pinimg.com/originals/02/54/40/025440523efce9c28dc4d4a3af42b326.png" alt="">
                         </div>
                         <div class="name">
                             <span>dfcsdfsdf</span>
                         </div>
                        </div>
                     </div>
                </a>
                <a href="#">
                    <div class="product">
                        <div>
                         <div class="thumbnail">
                             <img src="https://i.pinimg.com/originals/02/54/40/025440523efce9c28dc4d4a3af42b326.png" alt="">
                         </div>
                         <div class="name">
                             <span>dfcsdfsdf</span>
                         </div>
                        </div>
                     </div>
                </a>
                <a href="#">
                    <div class="product">
                        <div>
                         <div class="thumbnail">
                             <img src="https://i.pinimg.com/originals/02/54/40/025440523efce9c28dc4d4a3af42b326.png" alt="">
                         </div>
                         <div class="name">
                             <span>dfcsdfsdf</span>
                         </div>
                        </div>
                     </div>
                </a>
            </div>
        </div>
    </div>
@stop
