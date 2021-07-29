@extends('dashboard.layouts.master')

@section('title', 'Edit Products')
@section('pageClass','products-page')

@section('content')
    <span class="title">@yield('title'): <a href="javascript:document.querySelector('#add-product').submit();" class="action">Update</a></span>
    <hr>
    <div class="content">
        <form action="{{ url('/') }}" id="add-product" method="post">
            <div class="row">
                <div class="form-group col-8">
                    <label for="title">Title:</label>
                    <input class="form-control" placeholder="Title..." type="text" name="title" id="title">
                </div>
                <div class="form-group col-4">
                    <label for="price">Price:</label>
                    <input class="form-control" placeholder="Price..." type="text" name="price" id="price">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="description">Description:</label>
                    <textarea name="description" placeholder="Description..." id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="thumbnail">Thumbnail:</label>
                    <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                </div>
                <div class="form-group col-6">
                    <label for="gallery">Gallery:</label>
                    <input type="file" class="form-control" name="gallery" multiple id="gallery">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-2">
                    <label for="width">Width:</label>
                    <input type="text" id="width" name="width" placeholder="width..." class="form-control">
                </div>
                <div class="form-group col-2">
                    <label for="height">Height:</label>
                    <input type="text" id="height" name="height" placeholder="height..." class="form-control">
                </div>
                <div class="form-group col-2">
                    <label for="depth">Depth:</label>
                    <input type="text" id="depth" name="depth" placeholder="depth..." class="form-control">
                </div>
                <div class="form-group col-6">
                    <label for="category">Category:</label>
                    <select name="category" id="category" placeholder="category..." class="form-control">
                        <option selected disabled>Category...</option>
                        <option value="1">Category 1</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 p-0">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="points">Points:</label>
                            <input type="number" class="form-control" placeholder="Points..." name="points" id="points">
                        </div>
                        <div class="form-group col-6">
                            <label for="stock">Stock:</label>
                            <input type="number" class="form-control" placeholder="Stock..." name="stock" id="stock">
                        </div>
                    </div>
                </div>
                <div class="col-2" style="display: flex;align-items: center;justify-content: space-between;">
                    <div class="row" style="display: flex;align-items: center;justify-content: space-between;">
                        <div class="form-group col" style="margin-right: 16px;">
                            <input type="checkbox" name="onsale" id="onsale" class="form-check">
                            <label for="onsale">On Sale</label>
                        </div>
                        <div class="form-group col"  style="margin-right: 16px;">
                            <input type="checkbox" name="inslider" id="inslider" class="form-check">
                            <label for="inslider">In Slider</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="Meterials">Meterials:</label>
                    <select name="Meterials" multiple id="Meterials" height="50" placeholder="Meterials..." class="form-control">
                        <option selected disabled>Meterials...</option>
                        <option value="1">Meterials 1</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="goodtoknow">Good to know:</label>
                    <textarea name="goodtoknow" id="goodtoknow" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="fulldescription">Full description:</label>
                    <textarea name="fulldescription" id="fulldescription" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </form>
    </div>
@stop
