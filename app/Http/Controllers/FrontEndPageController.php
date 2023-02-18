<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use App\Models\Sliders;

class FrontEndPageController extends Controller
{
    public function index(){
        $data['packages'] = Packages::all();
        $data['sliders'] = Sliders::all()->sortBy("slider_order");
        return view("Public.index")->with('data',$data);
    }
}
