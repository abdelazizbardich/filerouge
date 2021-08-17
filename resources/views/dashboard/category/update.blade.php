@extends('dashboard.layouts.master')

@section('title', 'Update category')
@section('pageClass','update-category')

@section('content')
    <h3 class="text-primary mb-5">Edit category</h3>
    <div>
        <form action="{{ url('/dashboard/categories/update/'.$category->id) }}" id="update-category" method="post">
            @csrf
            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-primary" for="name">Name</label>
                        <input value="@if (old('name')) {{ old('name') }} @else {{ $category->name }} @endif" class="border-primary form-control form-control-lg @error('name') is-invalid @enderror" type="text" style="color: rgb(255,255,255);" name="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit">Save</button></div>
                </div>
            </div>
        </form>
    </div>
@stop
