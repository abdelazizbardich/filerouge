<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Str;
use Validator;
use App\Models\User;

class userController extends Controller
{
    public function create(Request $request){


        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users',
            'fname' => 'required|',
            'lname' => 'required|',
            'country' => 'required|string',
            'region' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'zip_code' => 'required|numeric',
            'state' => 'required|max:1|integer',
            'password' => 'required'
        ]);


        if($validator->fails()){
            return $validator->errors();
        }


        return User::create([
            'email' => $request->input('email'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'zip_code' => $request->input('zip_code'),
            'state' => $request->input('state'),
            'password' => Hash::make($request->input('password')),
            'api_token' => Str::random(60),
        ]);
    }


    public function getToken(){
        session_start();
        if(isset($_SESSION['token'])){
            return [
                'token' => $_SESSION['token']
            ];
        }else{
            $_SESSION['token'] = Str::random(60);
            return [
                'token' => $_SESSION['token']
            ];
        }
    }
}
