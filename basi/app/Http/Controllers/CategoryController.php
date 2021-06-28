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
        // Query Builder based
        // $allcat = DB::table('categories')->latest()->paginate(2);
        // Model with satatic class based
        $allcat = Category::latest()->paginate(5);
        //object based data view



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
        // model based data inseart Auto data field  Work
        // Category::insert(
        //     [
        //         'user_id'=>Auth::user()->id,
        //         'category_name'=> $request->category_name,
        //         'created_at' => Carbon::now()
        //     ]
        // );

        // object based data insert into table Auto data field not Work part

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->created_at= Carbon::now();
        // $category->save();

        // query bulder based data inseart Auto data field not Work
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id']=Auth::user()->id;
        $data['created_at'] = Carbon::now();
        DB::table('categories')->insert($data);




        return Redirect()->back()->with('success','Category Inserted Successfully');
    }
}
