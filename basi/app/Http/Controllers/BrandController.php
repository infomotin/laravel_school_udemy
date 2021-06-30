<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    //declaring Functions
    public function AllBrand()
    {
        $allbrand = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('allbrand'));
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
        $image_name = $image_gen_name . '.' . $image_ext;
        //image upload Locations
        $upload_image_path = 'image/brand/';
        // for data base colum
        $last_image =  $upload_image_path . $image_name;
        // move this image in public folder_name with rename
        $brand_img->move($upload_image_path, $image_name);
        //insert image on db
        Brand::insert(
            [
                'brand_name' => $request->brand_name,
                'brand_img' => $last_image,
                'created_at' => Carbon::now(),
            ]
        );
        return Redirect()->back()->with('success', 'Brand Inserted Successfully');


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





    }
    public function editBrand($id)
    {
        $loadEdit = Brand::find($id);
        return view('admin.brand.editbrand',compact('loadEdit'));
    }
    public function updateBrand(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'max:255|min:6',


            ],
            [

                'brand_name.min' => 'Six Minimum',


            ]
        );
        //image part
        $old_image = $request->old_image;
        $brand_img = $request->file('brand_img');
        //generate image name

        if($brand_img ){
            $image_gen_name = hexdec(uniqid());
            $image_ext = strtolower($brand_img->getClientOriginalExtension());
            $image_name = $image_gen_name . '.' . $image_ext;
            //image upload Locations
            $upload_image_path = 'image/brand/';
            // for data base colum
            $last_image =  $upload_image_path . $image_name;
            // move this image in public folder_name with rename
            $brand_img->move($upload_image_path, $image_name);
            //unlink image
            unlink($old_image);
            //insert image on db

            $data = array();
            $data['brand_name'] = $request->brand_name;
            $data['brand_img'] = $last_image;
            $data['updated_at'] = Carbon::now();
            DB::table('brands')->where('id', $id)->update($data);

            return Redirect()->back()->with('success', 'Brand update Successfully');
        }else{
            $data = array();
            $data['brand_name'] = $request->brand_name;

            $data['updated_at'] = Carbon::now();
            DB::table('brands')->where('id', $id)->update($data);

            return Redirect()->back()->with('success', 'Brand update Successfully');
        }


    }
    public function delete($id)
    {
        $delete = Brand::find($id)->forceDelete();
        return Redirect()->route('all.brand')->with('success', 'Brand Delete Successfully');
    }
}
