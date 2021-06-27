<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return "some thing";
    }
    public function allCat(){
        return view('admin.category.category');
    }
    public function addcategory(Request $request){
        $validated = $request->validate([
            'cat_name' => 'required|unique:posts|max:255',

        ]);

    }
}
