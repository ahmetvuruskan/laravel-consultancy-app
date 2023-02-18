<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\Sliders;

class CmsController extends Controller
{
    public function sliderIndex(){
        $data['sliders'] = Sliders::all();
        return view("Dashboard.Admin.Cms.Slider.index")->with("data",$data);
    }
}
