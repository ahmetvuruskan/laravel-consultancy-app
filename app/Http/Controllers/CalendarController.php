<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
class CalendarController extends Controller
{

    public function index(){
        return view("Dashboard.Psychologist.calendar");
    }
    public function interviews(){
        $products = new Products();
        $data['products'] = $products->getProdcuts(Auth::user()->id);
        return view("Dashboard.Psychologist.Interview.index")->with("data",$data);
    }
}
