<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orders_has_product;

class orderController extends Controller
{
    //

    public function index(){
        $orders = order::with(['user','shipping_adress','product'])->orderBy('id','DESC')->get();
        foreach($orders as $okey => $order){
            $orders[$okey]->price = 0;
            foreach($order->product as $product){
                $orders[$okey]->price += ($product->price * orders_has_product::where('orders_id',$order->id)->where('products_id',$product->id)->first()->qte);
            }
        }
        $data = [
            'orders' => $orders
        ];
        // dd($data);
        return view('dashboard.order.all',$data);
    }


    public function delete($id){
        $order = orders_has_product::where('orders_id',$id)->delete();
        $order = order::destroy($id);
        return redirect('/dashboard/order');
    }

    public function setFinished($id){
        order::where('id',$id)->update([
            "state" => 2
        ]);
        return redirect('/dashboard/order');
    }
    public function approve($id){
        order::where('id',$id)->update([
            "state" => 1
        ]);
        return redirect('/dashboard/order');
    }
}
