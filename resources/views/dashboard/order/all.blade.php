@extends('dashboard.layouts.master')

@section('title', 'order')
@section('pageClass','all-orders')

@section('content')
    <h1 class="text-primary mb-4">Orders</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table table-striped table-hover table-sm my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>State</th>
                            <th>Code</th>
                            <th><strong>User</strong></th>
                            <th class="text-nowrap"><strong>Created at</strong><br></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="text-nowrap">1</td>
                            <td class="text-nowrap">
                                @switch($order->state)
                                    @case(0)
                                        <span class="badge badge-warning text-dark">Panding</span>
                                        @break
                                    @case(1)
                                        <span class="badge badge-success">Approved</span>
                                        @break
                                    @case(2)
                                        <span class="badge badge-dark">Finished</span>
                                        @break
                                    @default
                                        <span class="badge badge-danger">Error</span>
                                @endswitch
                            </td>
                            <td class="text-nowrap">{{ $order->code }}</td>
                            <td class="text-nowrap">{{ $order->user->fname }} {{ $order->user->lname }}</td>
                            <td class="text-nowrap">
                                <a href="{{ url('/dashboard/order/'.$order->id) }}" class="btn btn-info btn-sm" role="button" style="margin-right: 5px;margin-left: 5px;"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('/dashboard/order/finished/'.$order->id) }}" class="btn btn-dark btn-sm" role="button" style="margin-right: 5px;margin-left: 5px;">Set Finished</a>
                                <a href="{{ url('/dashboard/order/approve/'.$order->id) }}" class="btn btn-success btn-sm" role="button" style="margin-right: 5px;margin-left: 5px;">Approve</a>
                                <a href="{{ url('/dashboard/order/delete/'.$order->id) }}" class="btn btn-danger btn-sm" role="button" style="margin-right: 5px;margin-left: 5px;">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>#</td>
                            <td><strong>State</strong><br></td>
                            <td><strong>Code</strong><br></td>
                            <td><strong>User</strong></td>
                            <td class="text-nowrap"><strong>Created at</strong><br></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
