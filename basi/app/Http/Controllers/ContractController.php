<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    //create index method that we declaraing on Route file
    public function index(){
        // echo ('//create index method that we declaraing on Route file');
        return view('about');
    }
}
