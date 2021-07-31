@extends('dashboard.layouts.master')

@section('title', 'Add Products')
@section('pageClass','products-page')

@section('content')
    <span class="title">@yield('title'): <a href="javascript:document.querySelector('#add-product').submit();" class="action">Save</a></span>
    <hr>
    <div class="content">
        <form action="{{ url('/dashboard/product/add') }}" id="add-product" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-8">
                    <label for="title">Title:</label>
                    <input value="{{ old('title') }}"  class="form-control @error('title') is-invalid @enderror" placeholder="Title..." type="text" name="title" id="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="price">Price:</label>
                    <input value="{{ old('price') }}"  class="form-control @error('price') is-invalid @enderror" placeholder="Price..." type="text" name="price" id="price">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="description">Description:</label>
                    <textarea  name="description" placeholder="Description..." id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('fulldescription') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="thumbnail">Thumbnail:</label>
                    <input value="{{ old('thumbnail') }}"  type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail">
                    @error('thumbnail')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="gallery">Gallery:</label>
                    <input value="{{ old('gallery') }}"  type="file" class="form-control @error('gallery') is-invalid @enderror" name="gallery" multiple id="gallery">
                    @error('gallery')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-2">
                    <label for="width">Width:</label>
                    <input value="{{ old('width') }}"  type="text" id="width" name="width" placeholder="width..." class="form-control @error('width') is-invalid @enderror">
                    @error('width')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-2">
                    <label for="height">Height:</label>
                    <input value="{{ old('height') }}"  type="text" id="height" name="height" placeholder="height..." class="form-control @error('height') is-invalid @enderror">
                    @error('height')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-2">
                    <label for="depth">Depth:</label>
                    <input value="{{ old('depth') }}"  type="text" id="depth" name="depth" placeholder="depth..." class="form-control @error('depth') is-invalid @enderror">
                    @error('depth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="category">Category:</label>
                    <select name="category" id="category" placeholder="category..." class="form-control @error('category') is-invalid @enderror">
                        <option selected disabled>Category...</option>
                        @foreach ($categories as $category)
                        <option @if (old('category') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-4 p-0">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="points">Points:</label>
                            <input value="{{ old('points') }}"  type="number" class="form-control @error('points') is-invalid @enderror" placeholder="Points..." name="points" id="points">
                            @error('points')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="stock">Stock:</label>
                            <input value="{{ old('stock') }}"  type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Stock..." name="stock" id="stock">
                            @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-2" style="display: flex;align-items: center;justify-content: space-between;">
                    <div class="row" style="display: flex;align-items: center;justify-content: space-between;">
                        <div class="form-group col" style="margin-right: 16px;">
                            <input value="{{ old('onsale') }}"  type="checkbox" name="onsale" id="onsale" class="form-check @error('onsale') is-invalid @enderror">
                            <label for="onsale">On Sale</label>
                            @error('onsale')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col"  style="margin-right: 16px;">
                            <input value="{{ old('inslider') }}"  type="checkbox" name="inslider" id="inslider" class="form-check @error('inslider') is-invalid @enderror">
                            <label for="inslider">In Slider</label>
                            @error('inslider')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="materials">Materials:</label>
                    <select name="materials" multiple id="materials" height="50" placeholder="Materials..." class="form-control @error('materials') is-invalid @enderror">
                        <option selected disabled>Meterials...</option>
                        @foreach ($materials as $material)
                        <option @if (old('materials') == $material->id) selected @endif  value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
                    @error('materials')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="goodtoknow">Good to know:</label>
                    <textarea name="goodtoknow" id="goodtoknow" cols="30" rows="10" class="form-control @error('goodtoknow') is-invalid @enderror">{{ old('goodtoknow') }}</textarea>
                    @error('goodtoknow')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="fulldescription">Full description:</label>
                    <textarea name="fulldescription" id="fulldescription" cols="30" rows="10" class="form-control @error('fulldescription') is-invalid @enderror">{{ old('fulldescription') }}</textarea>
                    @error('fulldescription')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@stop
