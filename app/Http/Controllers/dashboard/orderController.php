<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    //

    public function index(){
        $data = [
            'orders' => Order::orderBy('id','DESC')->get()
        ];
        return view('dashboard.order.all',$data);
    }
}
