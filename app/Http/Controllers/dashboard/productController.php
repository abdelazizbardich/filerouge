<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Validator;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\Media;
use App\Models\products_has_media;
use Storage;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $data = [
            "products" => Product::with(['medias'])->orderBy('id','DESC')->get(),
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
        // dd($request);
        $validator = $request->validate([
            "title" => "required|string|max:70",
            "price" => "required",
            "description" => "required|string",
            "thumbnail" => "required",
            // "gallery" => "required",
            "width" => "required",
            "height" => "required",
            "depth" => "required",
            "category" => "required",
            "points" => "required",
            "stock" => "required",
            "goodtoknow" => "required|string",
            "materials" => "required",
            // "inslider" => "required",
            // "onsale" => "required",
            "points" => "required",
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
            'in_slide' => ($request->input('inslider') == "on")? true : false,
            'in_slide' => ($request->input('in_slide') == "on")? true : false,
            'thumbnail' => $request->input('thumbnail'),
            'points' => $request->input('points'),
            'full_description' => $request->input('fulldescription')
        ]);
        if(!$product) return redirect()->back()->withErrors($validator)->withInput();

        $thumbnail = $request->file('thumbnail')->store('thumbnail','public');
        if(!$thumbnail) return redirect()->back()->withErrors($validator)->withInput();
        $Thumbnail = Media::create([
            'path' => $thumbnail,
            'alt' => $request->input('title')
        ]);
        products_has_media::create([
            'products_id' => $product->id,
            'medias_id' => $Thumbnail->id,
            'type' => 'thumbnail'
        ]);
        Product::where('id',$product->id)->update([
            'thumbnail' => $Thumbnail->path
        ]);
        if($request->file('gallery') !== null){
            foreach($request->file('gallery') as $gallery){
                $gallery = $gallery->store('gallerys','public');
                if(!$gallery) return redirect()->back()->withErrors($validator)->withInput();
                $gallery = Media::create([
                    'path' => $gallery,
                    'alt' => $request->input('title')
                ]);
                products_has_media::create([
                    'products_id' => $product->id,
                    'medias_id' => $gallery->id,
                    'type' => 'gallery'
                ]);
            }
        }
        return redirect('/dashboard/product');
    }
    public function update($id,Request $request){
        dd($request);
    }
}
