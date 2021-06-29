<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    //declaring Functions
    public function AllBrand(){
        $allbrand = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('allbrand'));
    }
    public function AddBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:255',
                'brand_img' => 'required|unique:brands|max:255',

            ],
            [
                'category_name.required' => 'Place Input Category Name ',
                'category_name.unique' => 'Duplicate ',
                'category_name.max' => 'dont Exite Your limit ',

            ]
        );
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
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();
        DB::table('categories')->insert($data);




        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }
    public function editBrand(Request $request,$id){
        return ;
    }
    public function updateBrand(Request $request, $id)
    {
        return;
    }
    public function delete(Request $request, $id)
    {
        return;
    }
}
