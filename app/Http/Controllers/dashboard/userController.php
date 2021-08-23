<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Hash;

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
        $user = User::where('id',$id)->update([
            'state' => 0
        ]);
        if($user){
            return redirect('/dashboard/user');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function activate($id){
        $user = User::where('id',$id)->update([
            'state' => 1
        ]);
        if($user){
            return redirect('/dashboard/user');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function profile(Request $request){
        $user = $request->session()->get('admin');
        return view('dashboard.user.profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string',
            'password' => 'confirmed'
        ]);
        if($request->input('password') !== null){
            $user = Admin::where('id',$request->session()->get('admin')->id)->update([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password'))
            ]);
        }else{
            $user = Admin::where('id',$request->session()->get('admin')->id)->update([
                'name' => $request->input('name')
            ]);
        }
        $request->session()->put('admin', Admin::where('id',$request->session()->get('admin')->id)->first());
        return redirect('/dashboard/user/profile');
    }
}
