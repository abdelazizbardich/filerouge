<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Validator;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\Media;
use App\Models\products_has_media;
use App\Models\product_has_material;

use Storage;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $data = [
            "products" => Product::with(['medias','categories','materials'])->orderBy('id','DESC')->get(),
            "active" => 0
        ];
        // dd($data);
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
    public function edit($id){
        $data = [
            "product" => Product::with(['materials','medias'])->where('id',$id)->first(),
            "categories" => Category::orderBy('id','DESC')->get(),
            'materials' => Material::orderBy('id','DESC')->get()
        ];
        // dd($data);
        return view("dashboard.product.edit",$data);
    }
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
            'good_to_know' => $request->input('goodtoknow'),
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
        foreach($request->input('materials') as $mat){
            product_has_material::create([
                'products_id' => $product->id,
                'materials_id' => $mat
            ]);
        }
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
        // dd($request);
        $validator = $request->validate([
            "title" => "required|string|max:70",
            "price" => "required",
            "description" => "required|string",
            // "thumbnail" => "required",
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
        $product = Product::where('id',$id)->update([
            'categories_id' => $request->input('category'),
            'name' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'dimentions' => json_encode($dimentions),
            'good_to_know' => $request->input('goodtoknow'),
            'stock' => $request->input('stock'),
            'in_slider' => ($request->input('inslider') == "on")? true : false,
            'on_sale' => ($request->input('onsale') == "on")? true : false,
            // 'thumbnail' => $request->input('thumbnail'),
            'points' => $request->input('points'),
            'full_description' => $request->input('fulldescription')
        ]);
        if(!$product) return redirect()->back()->withErrors($validator)->withInput();

        if($request->file('thumbnail') !== null){
            $thumbnail = $request->file('thumbnail')->store('thumbnail','public');
            if(!$thumbnail) return redirect()->back()->withErrors($validator)->withInput();
            Product::where('id',$id)->update([
                'thumbnail' => $thumbnail
            ]);
        }


        product_has_material::where('products_id',$id)->delete();
        foreach($request->input('materials') as $mat){
            product_has_material::create([
                'products_id' => $id,
                'materials_id' => $mat
            ]);
        }


        if($request->file('gallery') !== null){
            $likedMedias = products_has_media::where('products_id',$id)->get();
            if($likedMedias){
                products_has_media::where('products_id',$id)->delete();
                foreach($likedMedias as $media){
                    Media::where('id',$media->medias_id)->delete();
                }
            }
            foreach($request->file('gallery') as $gallery){
                $gallery = $gallery->store('gallerys','public');
                if(!$gallery) return redirect()->back()->withErrors($validator)->withInput();
                $gallery = Media::create([
                    'path' => $gallery,
                    'alt' => $request->input('title')
                ]);
                products_has_media::create([
                    'products_id' => $id,
                    'medias_id' => $gallery->id,
                    'type' => 'gallery'
                ]);
            }
        }
        return redirect('/dashboard/product');
    }
    public function destroy(int $id){
        $linkedMedias = products_has_media::where('products_id',$id)->get();
        products_has_media::where('products_id',$id)->delete();
        foreach($linkedMedias as $media){
            Media::where('id',$media->medias_id)->delete();
        }
        product_has_material::where('products_id',$id)->delete();
        Product::where('id',$id)->delete();
        return redirect('/dashboard/product');
    }
}
