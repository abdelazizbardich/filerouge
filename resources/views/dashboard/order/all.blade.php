@extends('dashboard.layouts.master')

@section('title', 'order')
@section('pageClass','all-orders')

@section('content')
    <span class="title">@yield('title'):</span>
    <div class="content">
        <table class="table" border="0">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>country</th>
                <th>region</th>
                <th>City</th>
                <th>street</th>
                <th>zip_code</th>
                <th>Cart</th>
                <th>Order price</th>
                <th>Created at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->fname }} {{ $order->user->fname }}</td>
                    <td>{{ $order->shipping_adress->country }}</td>
                    <td>{{ $order->shipping_adress->region }}</td>
                    <td>{{ $order->shipping_adress->city }}</td>
                    <td>{{ $order->shipping_adress->street }}</td>
                    <td>{{ $order->shipping_adress->zip_code }}</td>
                    <td>
                        @foreach ($order->product as $p)
                            <div>- <a href="{{ url('product/24'.$p->id) }}">{{ $p->name }}</a></div><br>
                        @endforeach
                    </td>
                    <td>{{ $order->price }} DH</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ url('/dashboard/order/delete/'.$order->id) }}" class="action text danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>country</th>
                    <th>region</th>
                    <th>City</th>
                    <th>street</th>
                    <th>zip_code</th>
                    <th>Cart</th>
                    <th>Order price</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop
