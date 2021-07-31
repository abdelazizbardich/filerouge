<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class materialController extends Controller
{
    public function index(){
        $data = [
            'materials' => material::orderBy('id','DESC')->get()
        ];
        return view('dashboard.material.all',$data);
    }

    public function store(Request $request){
        dd($request);
        $validator = $request->validate([
            'name' => 'required|string|max:50'
        ]);
        $material = material::create([
            'name' => $request->input('name')
        ]);
        if($material){
            return Redirect('/dashboard/material/');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function delete($id){
        if(material::where('id',$id)->delete()){
            return Redirect('/dashboard/material/');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public  function getUpdate($id){
        $data = [
            'material' => material::find($id)
        ];
        return view('dashboard.material.update',$data);
    }

    public function update($id,Request $request){
        $validator = $request->validate([
            'name' => 'required|max:50|string',
        ]);

        $material = material::where('id',$id)->update([
            'name' => $request->input('name')
        ]);
        if($material){
            return redirect('/dashboard/material');
        }else
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
