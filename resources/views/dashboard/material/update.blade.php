@extends('dashboard.layouts.master')

@section('title', 'Update material')
@section('pageClass','update-material')

@section('content')
<h3 class="text-primary mb-5">Edit material</h3>
<div>
    <form action="{{ url('/dashboard/material/update/'.$material->id) }}" id="add-material" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="text-primary" for="name">Name</label>
                    <input value="@if (old('name')) {{ old('name') }} @else {{ $material->name }} @endif" class="border-primary form-control form-control-lg @error('name') is-invalid @enderror" type="text" style="color: rgb(255,255,255);" name="name">
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
