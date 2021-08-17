<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class userController extends Controller
{
    //

    public function index(){
        $data = [
            'users' => User::orderBy('id','DESC')->get()
        ];
        return view('dashboard.user.all',$data);
    }

    public function suspend($id){
        $user = user::where('id',$id)->update([
            'state' => 0
        ]);
        if($user){
            return redirect('/dashboard/user');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function activate($id){
        $user = user::where('id',$id)->update([
            'state' => 1
        ]);
        if($user){
            return redirect('/dashboard/user');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
