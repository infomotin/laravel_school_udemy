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
                'brand_name' => 'required|unique:brands|max:255|min:6',
                'brand_img' => 'required|mimes:jpg,png,jpeg',

            ],
            [
                'brand_name.required' => 'Place Input Brand Name ',
                'brand_name.unique' => 'Duplicate!',
                'brand_name.max' => 'dont Exite Your limit ',
                'brand_img.required' => 'Place upload Image',

            ]
        );
        //image part
        $brand_img = $request->file('brand_img');
        //generate image name
        $image_gen_name = hexdec(uniqid());
        $image_ext = strtolower($brand_img->getClientOriginalExtension());
        $image_name = $image_gen_name.'.'.$image_ext;
        //image upload Locations



        // $data = array();
        // $data['brand_name'] = $request->category_name;
        // $data['brand_img'] = $request->category_name;

        // $data['created_at'] = Carbon::now();
        // DB::table('categories')->insert($data);

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
