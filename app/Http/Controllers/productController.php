<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Validator;
class productController extends Controller
{


    public function find($id){
        return product::with(['categories','materials','medias'])->find($id);
    }


    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'categories_id'=> 'required|max:11|numeric|exists:categories,id',
            'name'=> 'required|max:70',
            'price'=> 'required|numeric',
            'description'=> 'required',
            'thumbnail' => 'required|url',
            'dimentions'=> 'required|json',
            'good_to_know'=> 'required|max:220',
            'stock'=> 'required|max:11',
            'full_description'=> 'required',
        ]);

        if ($validator->fails()) {
           return $validator->errors();
        }
        $product = product::create([
            'categories_id' => $request->input('categories_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'thumbnail' => $request->input('thumbnail'),
            'dimentions' => $request->input('dimentions'),
            'good_to_know' => $request->input('good_to_know'),
            'stock' => $request->input('stock'),
            'full_description' => $request->input('full_description')
        ]);
        return $product;
    }

    public function get(){
        return product::with(['categories','medias'])->orderBy('id','DESC')->paginate(12);
    }

    public function getSlide(){
        return product::where('in_slider',1)->with(['categories','medias'])->orderBy('id','DESC')->get();
    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(),[
            'categories_id'=> 'required|max:11|numeric|exists:categories,id',
            'name'=> 'required|max:70',
            'price'=> 'required|numeric',
            'description'=> 'required',
            'dimentions'=> 'required|json',
            'good_to_know'=> 'required|max:220',
            'stock'=> 'required|max:11',
            'full_description'=> 'required',
        ]);

        if ($validator->fails()) {
           return $validator->errors();
        }
        $product = product::where('id',$id)->update([
            'categories_id' => $request->input('categories_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'dimentions' => $request->input('dimentions'),
            'good_to_know' => $request->input('good_to_know'),
            'stock' => $request->input('stock'),
            'full_description' => $request->input('full_description')
        ]);
        return $product;
    }

    public function delete($id){
        return product::where('id',$id)->delete();
    }

    public function getByCategroy($id,$limit,$pid){
        return product::where('categories_id',$id)->where('id','!=',$pid)->limit($limit)->orderBy('id','DESC')->get();
    }
}
