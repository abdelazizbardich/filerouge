@extends('dashboard.layouts.master')

@section('title', 'Products')
@section('pageClass','products-page')

@section('content')
    <span class="title">@yield('title'): <a href="{{ url('/dashboard/product/add') }}" class="action">Add product</a></span>
    <div class="content">
        <div class="categories">
            <ul>
                @foreach ($categories as $category)
                    <li data-id="{{ $category->id }}" class="@if($category->id == $active) active @endif"><a href="{{ url('/dashboard/product/category/'.$category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
            <script>
                document.querySelector('li[data-id="{{ $active }}"]').scrollIntoView();
            </script>
        </div>
        <div class="products">
            <div>
                {{-- {{ $products }} --}}
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <a href="/product/{{ $product->id }}">
                            <div class="product">
                                <div>
                                <div class="thumbnail">
                                    <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="name">
                                    <span>{{ $product->name }}</span>
                                </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                        <div>
                            <span>Not products in this category</span>
                        </div>
                @endif
            </div>
        </div>
    </div>
@stop
