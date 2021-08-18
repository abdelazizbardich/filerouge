@extends('dashboard.layouts.master')

@section('title', 'Add Products')
@section('pageClass','products-page')

@section('content')
<h3 class="text-primary mb-5">Add product</h3>
<div>
    <form action="{{ url('/dashboard/product/add') }}" id="add-product" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-lg-9">
                <div class="form-group">
                    <label class="text-primary" for="title">Name</label>
                    <input required value="{{ old('title') }}" id="title" maxlength="70" class="border-primary form-control form-control-lg @error('title') is-invalid @enderror" type="text" style="color: rgb(255,255,255);" name="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="text-primary" for="price">Price</label>
                    <input required value="{{ old('price') }}" id="price" class="border-primary form-control form-control-lg @error('price') is-invalid @enderror" type="text" style="color: rgb(255,255,255);" name="price">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-xl-12">
                <div class="form-group">
                    <label class="text-primary" for="description">Description</label>
                    <textarea required id="description" class="border-primary form-control form-control-lg @error('description') is-invalid @enderror" name="description" style="color: rgb(255,255,255);" rows="7">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6 col-xl-6">
                <div class="form-group">
                    <label class="text-primary" for="thumbnail">Thumbnail</label>
                    <input required value="{{ old('thumbnail') }}" id="thumbnail" class="border rounded border-primary form-control-file form-control-lg @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail" style="padding: 6px 16px;">
                    @error('thumbnail')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group"><label class="text-primary" for="gallery">Gallery</label>
                    <input value="{{ old('gallery') }}" multiple class="border rounded border-primary form-control-file form-control-lg @error('gallery') is-invalid @enderror" id="gallery" type="file" name="gallery[]" style="padding: 6px 16px;">
                    @error('gallery')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-2">
                <div class="form-group"><label class="text-primary" for="width">Width</label>
                    <input required value="{{ old('width') }}" id="width" class="border-primary form-control form-control-lg @error('width') is-invalid @enderror" type="number" style="color: rgb(255,255,255);" name="width">
                    @error('width')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label class="text-primary" for="height">Height</label>
                    <input required value="{{ old('height') }}" id="height" class="border-primary form-control form-control-lg @error('height') is-invalid @enderror" type="number" style="color: rgb(255,255,255);" name="height">
                    @error('height')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label class="text-primary" for="depth">Depth</label>
                    <input required value="{{ old('depth') }}" id="depth" class="border-primary form-control form-control-lg @error('depth') is-invalid @enderror" type="number" style="color: rgb(255,255,255);" name="depth">
                    @error('depth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group"><label class="text-primary" for="price">Category</label>
                    <select required class="border-primary form-control form-control-lg @error('category') is-invalid @enderror" id="category" name="category">
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
        </div>
        <div class="form-row">
            <div class="col-lg-2">
                <div class="form-group"><label class="text-primary" for="points">Points</label>
                    <input required value="{{ old('points') }}" id="points" class="border-primary form-control form-control-lg @error('points') is-invalid @enderror" name="points" type="number" style="color: rgb(255,255,255);">
                    @error('points')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label class="text-primary" for="stock">Stock</label>
                    <input required value="{{ old('stock') }}" id="stock" class="border-primary form-control form-control-lg @error('stock') is-invalid @enderror" name="stock" type="number" style="color: rgb(255,255,255);">
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2"><label class="text-primary" for="">&nbsp;</label>
                <div class="form-group">
                    <div class="form-check">
                        <input  value="{{ old('onsale') }}" class="form-check-input  @error('onsale') is-invalid @enderror" type="checkbox" name="onsale" id="onsale"><label class="form-check-label text-primary" for="onsale">&nbsp;On Sale<br></label>
                    @error('onsale')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check"><input value="{{ old('inslider') }}" name="inslider" class="form-check-input  @error('inslider') is-invalid @enderror" type="checkbox" id="inslider"><label class="form-check-label text-primary" for="inslider">&nbsp;In Slider<br></label>
                    @error('inslider')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group"><label class="text-primary" for="materials">Materials</label>
                    <select required class="border-primary form-control form-control-lg @error('materials') is-invalid @enderror" id="materials" name="materials[]" multiple="">
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
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-xl-12">
                <div class="form-group">
                    <label class="text-primary" for="goodtoknow">Good to know<br></label>
                    <textarea required class="border-primary form-control form-control-lg @error('goodtoknow') is-invalid @enderror" name="goodtoknow" id="goodtoknow" style="color: rgb(255,255,255);" rows="5">{{ old('goodtoknow') }}</textarea>
                    @error('goodtoknow')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-xl-12">
                <div class="form-group">
                    <label class="text-primary" for="fulldescription">Full description<br></label>
                    <textarea required class="border-primary form-control form-control-lg" id="fulldescription" name="fulldescription" style="color: rgb(255,255,255); @error('fulldescription') is-invalid @enderror" rows="9">{{ old('fulldescription') }}</textarea>
                    @error('fulldescription')
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
