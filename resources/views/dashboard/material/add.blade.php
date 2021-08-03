@extends('dashboard.layouts.master')

@section('title', 'Add material')
@section('pageClass','add-material')

@section('content')
    <span class="title">@yield('title'): <a href="javascript:document.querySelector('#add-material').submit();" class="action">Save</a></span>
    <hr>
    <div class="content">
        <form action="{{ url('/dashboard/material/add') }}" id="add-material" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Name:</label>
                    <input value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror" placeholder="name..." type="text" name="name" id="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@stop
