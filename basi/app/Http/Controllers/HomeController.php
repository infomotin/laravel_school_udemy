<?php

namespace App\Http\Controllers;

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
