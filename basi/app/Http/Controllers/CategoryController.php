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
        // table join with query builder
        // $allcat = DB::table('categories')
        // // where condithons as like
        // ->join('users','categories.user_id', 'users.id')
        // //select field conditions
        // ->select('categories.*','users.name')
        // ->latest()->paginate(2);

        // Query Builder based
        // $allcat = DB::table('categories')->latest()->paginate(2);


        // Model with static class based using table join()
        $allcat = Category::latest()->paginate(5);
        $tashCategory = Category::onlyTrashed()->latest()->paginate(3);
        //object based data view



        return view('admin.category.category', compact('allcat','tashCategory'));
    }
    public function addcategory(Request $request){
        $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:255',

        ],
        [
                'category_name.required' => 'Place Input Category Name ',
                'category_name.unique' => 'Duplicate ',
                'category_name.max' => 'dont Exite Your limit ',

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

    // this part are working elegant worsens
    public function editCategory($id){
        // this part are working elegant worsens
        // $category = Category::find($id);
        // querey build method
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }
    // this part are working elegant worsens
    public function updateCategory(Request $request,$id){
        // this part are working elegant worsens
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);


            // Query Builder method

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['updated_at'] = Carbon::now();
        DB::table('categories')->where('id', $id)->update($data);

        return Redirect()->route('category')->with('success', 'Category Update Successfully');

    }
    public function softCategory($id){
        $delete = Category::find($id)->delete();

        return Redirect()->back()->with('success', 'Category Trash Successfully');
    }
    public function restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->route('category')->with('success', 'Category Restore Successfully');
    }

    public function delete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->route('category')->with('success', 'Category Delete Successfully');
    }
}
