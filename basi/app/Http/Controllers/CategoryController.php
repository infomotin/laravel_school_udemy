<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return "some thing";
    }
    public function allCat(){
        return view('admin.category.category');
    }
    public function addcategory(){
        return null;
    }
}
