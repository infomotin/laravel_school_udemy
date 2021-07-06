<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\slider;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function LoadSlider()
    {
        // $LoadSlider = DB::table('sliders')->get();
        $LoadSlider = slider::latest()->get();
        return view('admin.slider.index', compact('LoadSlider'));
    }

    public function AddSlider(Request $request)
    {
        return View('admin.slider.create');
        // $validated = $request->validate(
        //     [
        //         'title' => 'required|unique:sliders|max:255|min:10',
        //         'description' => 'max:255|min:10',
        //         'image' => 'required|mimes:jpg,png,jpeg',

        //     ],
        //     [
        //         'title.required' => 'Place Input Brand Name ',
        //         'title.unique' => 'Duplicate!',
        //         'title.max' => 'dont Exite Your limit ',
        //         'image.required' => 'Place upload Image',

        //     ]
        // );
        // $LoadSlider = DB::table('sliders')->get();
        // $LoadSlider = slider::latest()->get();
        // return view('admin.slider.index', compact('LoadSlider'));
    }
    public function InsertSlider(Request $request){
        $validated = $request->validate(
            [
                'title' => 'required|unique:sliders|max:255|min:10',
                'description' => 'max:255|min:10',
                'image' => 'required|mimes:jpg,png,jpeg',

            ],
            [
                'title.required' => 'Place Input Brand Name ',
                'title.unique' => 'Duplicate!',
                'title.max' => 'Dont Exite Your limit ',
                'image.required' => 'Place upload Image',

            ]
        );

        $slider_img = $request->file('image');
        // foreach ($brand_img as $image) {
            $image_gen = hexdec(uniqid()) . '.' . $slider_img->getClientOriginalExtension();
            Image::make($slider_img)->resize(600, 1300)->save('image/multi/' . $image_gen);
            $last_img = 'image/multi/' . $image_gen;
            var_dump($last_img);
        slider::insert(
                [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
                ]
            );
        // }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');


    }
    // public function editSlider(Request $request,$id)
    // {
    //     // $LoadSlider = DB::table('sliders')->get();
    //     $LoadSlider = slider::latest()->get();
    //     return view('admin.slider.index', compact('LoadSlider'));
    // }

    // public function delSlider($id)
    // {
    //     // $LoadSlider = DB::table('sliders')->get();
    //     $LoadSlider = slider::latest()->get();
    //     return view('admin.slider.index', compact('LoadSlider'));
    // }
}
