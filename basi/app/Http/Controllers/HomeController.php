<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    //
    public function HomeSlider(){
        $allslider = slider::latest()->paginate(5);
        return view('admin.slider.index',compact('allslider'));
    }
    public function AddSlider(){
        return view('admin.slider.addslider');
    }
    public function insertSlider(Request $request){
        $validated = $request->validate(
            [
                'title' => 'required|unique:sliders|max:255',
                'description' => 'required|unique:sliders|max:255',
                'image' => 'required|mimes:jpg,png,jpeg',

            ],
            [
                'title.required' => 'Place Input Category Name ',
                'title.unique' => 'Duplicate ',
                'title.max' => 'dont Exite Your limit ',
                'description.unique' => 'Duplicate ',
                'description.required' => 'Place Input Category Name ',
                'description.max' => 'dont Exite Your limit ',

            ]
        );
        $brand_img = $request->file('image');

            $image_gen = hexdec(uniqid()) . '.' . $brand_img->getClientOriginalExtension();
            Image::make($brand_img)->resize(300, 300)->save('image/slider/' . $image_gen);
            $last_img = 'image/slider/' . $image_gen;

            slider::insert(
                [
                'image' => $last_img,
                'title' => $request->title,
                'description' => $request->description,
                'description' => $request->title,
                'created_at' => Carbon::now(),
                ]
            );


        return Redirect('home.slider')->with('success', 'Brand Inserted Successfully');
    }
}
