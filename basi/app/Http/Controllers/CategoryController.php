<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;


class CategoryController extends Controller
{
    public function index(){
        return "some thing";
    }
    public function allCat(){

        $allcat = DB::table('categories')->get();
        return view('admin.category.category', compact('allcat'));
    }
    public function addcategory(Request $request){
        $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:255',

        ],
        [
                'category_name.required' => 'Place Input Category Name ',
                'category_name.unique' => 'Duplicat ',
                'category_name.max' => 'Dont Exite Your limite ',

        ]);

        // Category::insert(
        //     [
        //         'user_id'=>Auth::user()->id,
        //         'category_name'=> $request->category_name,
        //         'created_at' => Carbon::now()
        //     ]
        // );

        // object based data insert into table

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->created_at= Carbon::now();
        $category->save();

        return Redirect()->back()->with('success','Category Inserted Successfully');
    }
}
