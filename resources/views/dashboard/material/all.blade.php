@extends('dashboard.layouts.master')

@section('title', 'material')
@section('pageClass','all-material')

@section('content')
    <span class="title">@yield('title'): <a href="{{ url('/dashboard/material/add') }}" class="action">Add material</a></span>
    <div class="content">
        <table class="table" border="0">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->created_at }}</td>
                    <td><a href="{{ url('/dashboard/material/edit/'.$material->id) }}" class="action">Edit</a> <a href="{{ url('/dashboard/material/delete/'.$material->id) }}" class="action text danger">Delete</a></td>
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
