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
                <th>Created at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ url('/dashboard/order/edit/'.$order->id) }}" class="action">Edit</a> <a href="{{ url('/dashboard/order/delete/'.$order->id) }}" class="action text danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop
