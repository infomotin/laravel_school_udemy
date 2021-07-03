<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //create index method that we declaring on Route file
    public function index(){
        // echo ('//create index method that we declaring on Route file');
        return view('contract');
    }
}
