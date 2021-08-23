<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order;

class homeController extends Controller
{
    //

    public function index(){
        $data = [
            'producutsCount' => $this->getTotalProducts(),
            'ordersCount' => $this->getTotalOrders(),
            'monthlyEarning' => $this->getMonthlyEarning(),
            'annualEarining' => $this->getAnnualEarning(),
            'thisYearEarnings' => $this->getThisYearEarningByMoth()
        ];
        return view('dashboard.home',$data);
    }

    private function getTotalProducts(){
        return product::count();
    }

    private function getTotalOrders(){
        return order::count();
    }

    private function getMonthlyEarning(){
        return order::where('created_at', 'LIKE', date('Y').'-'.date('m').'%')->sum('total_price');
    }
    private function getAnnualEarning(){
        return order::where('created_at', 'LIKE', date('Y').'-'.'%')->sum('total_price');
    }

    private function getThisYearEarningByMoth(){
        return [
            order::where('created_at', 'LIKE', date('Y').'-01'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-02'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-03'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-04'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-05'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-06'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-07'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-08'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-09'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-010'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-011'.'%')->sum('total_price'),
            order::where('created_at', 'LIKE', date('Y').'-012'.'%')->sum('total_price'),
        ];
    }
}
