<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Validator;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\Media;
use Storage;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    // UI
    // public function index(){
    //     $data = [
    //         "products" => Product::orderBy('id','DESC')->get(),
    //         "categories" => Category::orderBy('id','DESC')->get(),
    //     ];
    //     return view("dashboard.product.all",$data);
    // }
    public function index(){
        $data = [
            "products" => Product::orderBy('id','DESC')->get(),
            "categories" => Category::orderBy('id','DESC')->get(),
            "active" => 0
        ];
        return view("dashboard.product.all",$data);
    }
    public function getByCategory($id){
        $data = [
            "products" => Product::where('categories_id',$id)->orderBy('id','DESC')->get(),
            "categories" => Category::orderBy('id','DESC')->get(),
            "active" => $id
        ];
        return view("dashboard.product.all",$data);
    }
    public function add(){
        $data = [
            "categories" => Category::orderBy('id','DESC')->get(),
            'materials' => Material::orderBy('id','DESC')->get()
        ];
        return view("dashboard.product.add",$data);
    }
    public function edit(){
        return view("dashboard.product.add");
    }

    // actions
    public function store(Request $request){
        // dd($request->file('thumbnail'));
        $validator = $request->validate([
            "title" => "required|string|max:70",
            "price" => "required",
            "description" => "required|string|max:170",
            "thumbnail" => "required",
            "gallery" => "required",
            "width" => "required",
            "height" => "required",
            "depth" => "required",
            "category" => "required",
            "points" => "required",
            "stock" => "required",
            "goodtoknow" => "required|string|max:170",
            "materials" => "required",
            // "inslider" => "required",
            // "onsale" => "required",
            "fulldescription" => "required"
        ]);
        $dimentions = [
            "w" => $request->input('width'),
            "h" => $request->input('height'),
            "d" => $request->input('depth')
        ];
        $product = Product::create([
            'categories_id' => $request->input('category'),
            'name' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'dimentions' => json_encode($dimentions),
            'good_to_know' => $request->input('goodtoknwo'),
            'stock' => $request->input('stock'),
            'full_description' => $request->input('fulldescription')
        ]);
        if(!$product) return redirect()->back()->withErrors($validator)->withInput();
        $thumbnail = $request->file('thumbnail')->store('thumbnail','public');
        if(!$thumbnail) return redirect()->back()->withErrors($validator)->withInput();
        $Gallery = Media::create([
            'path' => $thumbnail,
            'alt' => $request->input('title')
        ]);
        return redirect('/dashboard/product');
    }
    public function update($id,Request $request){
        dd($request);
    }
}
