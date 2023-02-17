<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndPageController extends Controller
{
    public function index(){
        return view("Public.index");
    }
}
