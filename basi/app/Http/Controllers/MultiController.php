<?php

namespace App\Http\Controllers;

use App\Models\multipicture;

use App\Http\Controllers\Image;

use Illuminate\Http\Request;

class MultiController extends Controller
{
    //write public functions
    public function AllImage(){
        $Images = multipicture::all();

        return view('admin.multipic.index',compact('Images'));
    }
    public function AddImages(Request $request){
        $validated = $request->validate(
            [
                'image' => 'required|mimes:jpg,png,jpeg',
            ],

        );
        //image part
        $brand_img = $request->file('image');
        foreach ($brand_img as $image){
            $image_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('image/multi/' . $image_gen);
            $last_img = 'image/multi/' . $image_gen;

            multipicture::insert(
                [
                    'image' => $request->image,
                    'created_at' => Carbon::now(),
                ]
            );
        }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }
}
