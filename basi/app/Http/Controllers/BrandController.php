<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    //declaring Functions
    public function AllBrand(){
        return view('admin.brand.index');
    }
}
