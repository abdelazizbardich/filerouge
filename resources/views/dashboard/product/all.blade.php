@extends('dashboard.layouts.master')

@section('title', 'Products')
@section('pageClass','products-page')

@section('content')
    <div class="row no-gutters">
        <div class="col">
            <h1 class="text-primary">Products</h1>
        </div>
        <div class="col-auto"><a class="btn btn-primary" role="button" href="{{ url('dashboard/product/add') }}">Add product</a></div>
    </div>
    <div class="card shadow" style="border: none;">
        <div class="card-body" style="background: #00114b;border-bottom-style: none;">
            <div class="table-responsive text-nowrap table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table table-striped table-hover table-sm my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th><br></th>
                            <th><strong>Photo</strong><br></th>
                            <th><strong>Name</strong><br></th>
                            <th><strong>Price</strong></th>
                            <th><strong>Stock</strong></th>
                            <th><strong>Points</strong></th>
                            <th><strong>Dimentions</strong><br></th>
                            <th><strong>Materials</strong><br></th>
                            <th class="text-nowrap"><strong>Good to know</strong><br></th>
                            <th class="text-nowrap"><strong>Description</strong><br></th>
                            <th class="text-nowrap"><strong>Full description</strong><br></th>
                            <th class="text-nowrap"><strong>Category</strong><br></th>
                            <th class="text-nowrap"><strong>added at</strong><br></th>
                            <th><br></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-nowrap">{{ $product->id }}</td>
                                <td class="text-nowrap"><img class="rounded mr-2" width="30" height="30" src="{{ asset('storage').'/'.$product->thumbnail }}"></td>
                                <td class="text-nowrap">{{ $product->name }}</td>
                                <td class="text-nowrap">{{ $product->price }} $</td>
                                <td class="text-nowrap">{{ $product->stock }}</td>
                                <td class="text-nowrap">{{ $product->points }} pt</td>
                                <td class="text-nowrap">widht: {{ json_decode($product->dimentions)->w }}, height: {{ json_decode($product->dimentions)->h }}, depth: {{ json_decode($product->dimentions)->d }}</td>
                                <td class="text-nowrap">
                                    <ul>
                                        @foreach ($product->materials as $material)
                                            <li>{{ $material->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-nowrap" data-toggle="tooltip" data-bss-tooltip="" data-placement="bottom" title="{{ $product->good_to_know }}">{{ substr($product->good_to_know,0,30) }}...</td>
                                <td class="text-nowrap" data-toggle="tooltip" data-bss-tooltip="" data-placement="bottom" title="{{ $product->description }}">{{ substr($product->description,0,30) }}...</td>
                                <td class="text-nowrap"  title="{{ $product->full_description }}">{{ substr($product->full_description,0,30) }}...</td>
                                <td class="text-nowrap">{{ $product->categories->name }}</td>
                                <td class="text-nowrap">{{ $product->created_at }}</td>
                                <td class="text-nowrap"><a class="btn btn-primary btn-sm" role="button" style="margin: 0px 5px;" href="{{ url('/dashboard/product/edit'.'/'.$product->id) }}">Edit</a><a class="btn btn-danger btn-sm" role="button" href="{{ url('/dashboard/product/delete'.'/'.$product->id) }}" style="margin: 0px 5px;">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><br></td>
                            <td><strong>Photo</strong><br></td>
                            <td><strong>Name</strong><br></td>
                            <td><strong>Price</strong></td>
                            <td><strong>Stock</strong></td>
                            <td><strong>Points</strong></td>
                            <td><strong>Dimentions</strong><br></td>
                            <td><strong>Materials</strong><br></td>
                            <td class="text-nowrap"><strong>Good to know</strong><br></td>
                            <td class="text-nowrap"><strong>Description</strong><br></td>
                            <td class="text-nowrap"><strong>Full description</strong><br></td>
                            <td class="text-nowrap"><strong>Category</strong><br></td>
                            <td class="text-nowrap"><strong>added at</strong><br></td>
                            <td><br></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
