<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\slider;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class HomeController extends Controller
{
    //
    public function HomeSlider()
    {
        $allslider = slider::latest()->paginate(5);
        return view('admin.slider.index', compact('allslider'));
    }
    public function AddSlider()
    {
        return view('admin.slider.addslider');
    }
    public function insertSlider(Request $request)
    {
        // $validated = $request->validate(
        //     [
        //         'title' => 'required|unique:sliders|max:255',
        //         'description' => 'required|unique:sliders|max:255',
        //         'image' => 'required|mimes:jpg,png,jpeg',

        //     ],
        //     [
        //         'title.required' => 'Place Input Category Name ',
        //         'title.unique' => 'Duplicate ',
        //         'title.max' => 'dont Exite Your limit ',
        //         'description.unique' => 'Duplicate ',
        //         'description.required' => 'Place Input Category Name ',
        //         'description.max' => 'dont Exite Your limit ',

        //     ]
        // );
        $brand_img = $request->file('image');

        $image_gen = hexdec(uniqid()) . '.' . $brand_img->getClientOriginalExtension();
        Image::make($brand_img)->resize(1920, 1088)->save('image/slider/' . $image_gen);
        $last_img = 'image/slider/' . $image_gen;

        slider::insert(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]
        );


        return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }
    public function EditSlider(Request $request,$id){
        $loadEdit = slider::find($id);
        return view('admin.slider.editslider', compact('loadEdit'));
    }
    public function updateSlider(Request $request,$id){
        $validated = $request->validate(
            [
                'title' => 'max:255|min:6',
                'description' => 'max:255|min:6',

            ],

        );
        //image part
        $old_image = $request->old_image;
        $brand_img = $request->file('image');

        //generate image name
        if ($brand_img) {
            $image_gen_name = hexdec(uniqid());
            $image_ext = strtolower($brand_img->getClientOriginalExtension());
            $image_name = $image_gen_name . '.' . $image_ext;
            //image upload Locations
            $upload_image_path = 'image/slider/';
            // for data base colum
            $last_image =  $upload_image_path . $image_name;
            // move this image in public folder_name with rename
            $brand_img->move($upload_image_path, $image_name);
            //unlink image
            unlink($old_image);
            //insert image on db

            $data = array();
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['image'] = $last_image;
            $data['updated_at'] = Carbon::now();
            DB::table('sliders')->where('id', $id)->update($data);

            return Redirect()->back()->with('success', 'Slider Name descriptions Successfully');
        } else {
            $data = array();
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['updated_at'] = Carbon::now();
            DB::table('sliders')->where('id', $id)->update($data);

            return Redirect()->back()->with('success', 'Slider Image Successfully');
        }


        return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }
}
