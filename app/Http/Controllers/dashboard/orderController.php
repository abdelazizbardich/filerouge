<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    //

    public function index(){
        $orders = Order::with(['user','shipping_adress','product'])->orderBy('id','DESC')->get();
        $data = [
            'orders' => $orders
        ];
        return view('dashboard.order.all',$data);
    }
}
