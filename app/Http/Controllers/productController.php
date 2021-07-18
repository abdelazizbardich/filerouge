<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Validator;
class productController extends Controller
{


    public function find($id){
        $products = Product::get();
        $products->token = csrf_token();
        return csrf_token();
    }

    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'categorys_id'=> 'required|max:11|numeric|exists:categorys,id',
            'name'=> 'required|max:70',
            'price'=> 'required|max:11|numeric',
            'description'=> 'required',
            'dimentions'=> 'required|json',
            'Good to know'=> 'required|max:220',
            'stock'=> 'required|max:11',
            'full_description'=> 'required',
        ]);

        if ($validator->fails()) {
           return $validator->errors();
        }

        $product = Product::create([
            'categorys_id' => $request->input('categorys_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'dimentions' => $request->input('dimentions'),
            'Good to know' => $request->input('Good to know'),
            'stock' => $request->input('stock'),
            'full_description' => $request->input('full_description')
        ]);
        return $product;
    }
}
