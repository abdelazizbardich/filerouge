<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Validator;
class productController extends Controller
{


    public function find($id){
        return Product::find($id);
    }


    public function create(Request $request){

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
        $product = Product::create([
            'categories_id' => $request->input('categories_id'),
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
