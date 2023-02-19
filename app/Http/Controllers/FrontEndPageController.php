<?php

namespace App\Http\Controllers;

use App\Models\Professions;
use Illuminate\Http\Request;
use App\Models\Sliders;

class FrontEndPageController extends Controller
{
    public function index(){
        $data['professions'] = Professions::take(6)->get();
        $data['sliders'] = Sliders::all()->sortBy("slider_order");
        return view("Public.index")->with('data',$data);
    }
}
