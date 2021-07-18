<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\category;
class categoryController extends Controller
{


    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|unique:categories,name'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        return Category::create([
            "name" => $request->input('name')
        ]);
    }
}
