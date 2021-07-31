@extends('dashboard.layouts.master')

@section('title', 'Update category')
@section('pageClass','update-category')

@section('content')
    <span class="title">@yield('title'): <a href="javascript:document.querySelector('#update-category').submit();" class="action">Update</a></span>
    <hr>
    <div class="content">
        <form action="{{ url('/dashboard/categories/update/'.$category->id) }}" id="update-category" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Name:</label>
                    <input value="@if (old('name')) {{ old('name') }} @else {{ $category->name }} @endif"  class="form-control @error('name') is-invalid @enderror" placeholder="name..." type="text" name="name" id="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@stop
