<?php
namespace App\Http\Controllers;
use App\Models\multipicture;
use Illuminate\Support\Carbon;
// use App\Http\Controllers\Auth;
// use App\Http\Controllers\Image;
use Illuminate\Http\Request;
use Auth;
// include composer autoload
// require 'vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class MultiController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //write public functions
    public function AllImage(){
        $Images = multipicture::latest()->paginate(6);

        return view('admin.multipic.index',compact('Images'));
    }
    public function AddImages(Request $request){

        $brand_img = $request->file('image');
        foreach($brand_img as $image){
            $image_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('image/multi/' . $image_gen);
            $last_img = 'image/multi/' . $image_gen;

            multipicture::insert(
                [
                    'image' => $last_img,
                    'created_at' => Carbon::now(),
                ]
            );
        }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }
    public function logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success', 'Yor Are Logout');
    }
}
