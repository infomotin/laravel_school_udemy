<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\slider;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function LoadSlider(){
        // $LoadSlider = DB::table('sliders')->get();
        $LoadSlider = slider::latest()->get();
        return view('admin.slider.index',compact('LoadSlider'));
    }
}
