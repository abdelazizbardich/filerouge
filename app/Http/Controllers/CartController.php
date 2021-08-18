<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use App\Models\User;
use App\Models\shipping_adress;
use App\Models\orders_has_product;
use App\Models\Product;
use Mail;
use Str;

class CartController extends Controller
{


    public function checkout(Request $request){
        $Validator = Validator::make($request->all(),[
            'firstName'=> 'required|string',
            'lastName'=> 'required|string',
            'phone'=> 'required',
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
            'shipping_adresses_id' => $shippingAdress->id,
        ]);
        $code = rand(111,999).$order->id;
        Order::where('id',$order->id)->update([
            'code' => $code
        ]);
        if($order){
            $products = [];
            $totalPrice = 0;
            $orderTotal = 0;
            foreach(json_decode($request->input('cart')) as $product){
                $pData = [];
                $orderProducts = orders_has_product::create([
                    'orders_id' => $order->id,
                    'products_id' => $product->productId,
                    'qte' => $product->count
                ]);
                if(!$order){return false;}
                $newProduct = Product::find($product->productId);
                $newProduct->stock -= $product->count;
                $newProduct->save();
                $totalPrice += ($newProduct->price * $product->count);
                $pData['img'] = $newProduct->thumbnail;
                $pData['unit'] = $product->count;
                $pData['name'] = $newProduct->name;
                $pData['price'] = $totalPrice;
                array_push($products,$pData);
                $orderTotal += $totalPrice;
            }
            if($totalPrice > 0){
                Order::where('id',$order->id)->update([
                    'total_price' => $orderTotal
                ]);
            }
        }
        Mail::send('emails.order-invoice', [
            'data' => $request->all(),
            'code'=>$code,
            'date'=>Str::limit($order->created_at, 11,''),
            'total' => $orderTotal,
            'products' => $products
        ], function ($m) use ($request) {
            $m->from('noreply@luxy-style.com', config('app.name'));
            $m->to($request->email, $request->lname)->subject('Order invoice');
        });
        return [
            'code' => $code,
            'date' => Str::limit($order->created_at, 11,'')
        ];
    }
}
