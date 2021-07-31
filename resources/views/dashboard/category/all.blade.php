@extends('dashboard.layouts.master')

@section('title', 'Categories')
@section('pageClass','all-categories')

@section('content')
    <span class="title">@yield('title'): <a href="{{ url('/dashboard/categories/add') }}" class="action">Add category</a></span>
    <div class="content">
        <table class="table" border="0">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ url('/dashboard/categories/edit/'.$category->id) }}" class="action">Edit</a> <a href="{{ url('/dashboard/categories/delete/'.$category->id) }}" class="action text danger">Delete</a></td>
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
