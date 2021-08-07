<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
class loginController extends Controller
{

    public function index(){
        return view('dashboard.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);
        $user = Admin::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $user->password = null;
                $user->remember_token = null;
                $request->session()->put('admin', $user);
                return redirect('/dashboard');
            }else{
                return redirect()->back()->withErrors(['password' => 'Wrong password !'])->withIputs(['email' => $request->email,'password' => $request->password]);
            }
        }else{
            return redirect()->back()->withErrors(['email' => 'This email is not in our records !'])->withIputs(['email' => $request->email,'password' => $request->password]);
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
