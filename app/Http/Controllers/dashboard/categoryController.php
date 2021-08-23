<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    //

    public function index(){
        $data = [
            'categories' => category::orderBy('id','DESC')->get()
        ];
        return view('dashboard.category.all',$data);
    }

    public function store(Request $request){
        $validator = $request->validate([
            'name' => 'required|string|max:50'
        ]);
        $category = category::create([
            'name' => $request->input('name')
        ]);
        if($category){
            return Redirect('/dashboard/categories/');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function delete($id){
        if(Category::where('id',$id)->delete()){
            return Redirect('/dashboard/categories/');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public  function getUpdate($id){
        $data = [
            'category' => category::find($id)
        ];
        return view('dashboard.category.update',$data);
    }

    public function update($id,Request $request){
        $validator = $request->validate([
            'name' => 'required|max:50|string',
        ]);

        $category = category::where('id',$id)->update([
            'name' => $request->input('name')
        ]);
        if($category){
            return redirect('/dashboard/categories');
        }else
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
