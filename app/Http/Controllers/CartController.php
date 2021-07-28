<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use App\Models\User;
use App\Models\shipping_adress;
use App\Models\orders_has_product;

class CartController extends Controller
{


    public function checkout(Request $request){
        $Validator = Validator::make($request->all(),[
            'firstName'=> 'required|string',
            'lastName'=> 'required|string',
            'phone'=> 'required|regex:/[0-9]{9}/',
            'country'=> 'required',
            'city'=> 'required',
            'email' => 'email',
            'adress'=> 'required',
            'payWith'=> 'required',
            'cart' => 'required',
        ]);

        if($Validator->fails()){
            return $Validator->errors();
        }
        $user = User::where('email',$request->input('email'))->first();
        if($user == null){
            $user = User::create([
                'fname' => $request->input('firstName'),
                'lname' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => rand(00000000,99999999),
                'country' => $request->input('country'),
                'region' => $request->input('region'),
                'city' => $request->input('city'),
                'street' => $request->input('adress'),
                'zip_code' => $request->input('zip_code')
            ]);
        }
        $shippingAdress = shipping_adress::create([
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'zip_code' => $request->input('zip_code')
        ]);
        if($shippingAdress)
        $order = Order::create([
            'users_id' => $user->id,
            'shipping_adresses_id' => $shippingAdress->id
        ]);
        if($order)
        foreach(json_decode($request->input('cart')) as $product){
            $orderProducts = orders_has_product::create([
                'orders_id' => $order->id,
                'products_id' => $product->productId,
                'qte' => $product->count
            ]);
            if(!$order){return false;}
        }
        return true;
    }
}
