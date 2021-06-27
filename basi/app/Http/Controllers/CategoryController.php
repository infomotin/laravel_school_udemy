<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;


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

        ],
        [
                'cat_name.required' => 'Place Input Category Name ',
                'cat_name.unique' => 'Duplicat ',
                'cat_name.max' => 'Dont Exite Your limite ',

        ]);

        Category::insert(
            [
                'user_id'=>Auth::user()->id,
                'category_name'=> $request->cat_name,
                'created_at' => Carbon::now(),
            ]
        );

    }
}
