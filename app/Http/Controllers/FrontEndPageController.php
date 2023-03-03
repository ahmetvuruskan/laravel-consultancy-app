<?php

namespace App\Http\Controllers;

use App\Models\Professions;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Blocks;
use App\Models\Pages;
class FrontEndPageController extends Controller
{
    public function index(){
        $data['professions'] = Professions::take(6)->get();
        $data['blocks'] = Blocks::all();
        $data['sliders'] = Sliders::all()->sortBy("slider_order");
        return view("Public.index")->with('data',$data);
    }
    public function pages($slug){
        $data['page'] = Pages::where("page_slug",$slug)->first();
        return view("Public.pages")->with('data',$data);
    }
}
