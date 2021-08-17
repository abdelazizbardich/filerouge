@extends('dashboard.layouts.master')

@section('title', 'Categories')
@section('pageClass','all-categories')

@section('content')
<div class="row no-gutters">
    <div class="col">
        <h3 class="text-primary">Categories</h3>
    </div>
    <div class="col-auto"><a class="btn btn-primary" role="button" href="{{ url('/dashboard/categories/add') }}">Add category</a></div>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
            <table class="table table-striped table-hover table-sm my-0" id="dataTable">
                <thead>
                    <tr>
                        <th><br></th>
                        <th><strong>Name</strong><br></th>
                        <th class="text-nowrap"><strong>Created at</strong><br></th>
                        <th><br></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td class="text-nowrap">{{ $category->id }}</td>
                        <td class="text-nowrap">{{ $category->name }}</td>
                        <td class="text-nowrap">{{ $category->created_at }}</td>
                        <td class="text-nowrap"><a class="btn btn-primary btn-sm" role="button" style="margin-right: 5px;margin-left: 5px;" href="{{ url('/dashboard/categories/edit/'.$category->id) }}">Update</a><a class="btn btn-danger btn-sm" href="{{ url('/dashboard/categories/delete/'.$category->id) }}" role="button" style="margin-right: 5px;margin-left: 5px;">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><br></td>
                        <td><strong>Name</strong><br></td>
                        <td class="text-nowrap"><strong>Created at</strong><br></td>
                        <td><br></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@stop
