<?php

namespace App\Http\Controllers;

use App\Models\Professions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Blocks;
use App\Models\Pages;
use Illuminate\Support\Facades\Mail;
class FrontEndPageController extends Controller
{
    public function index(){
        $data['professions'] = Professions::take(6)->get();
        $data['blocks'] = Blocks::all();
        $data['services'] = Professions::inRandomOrder()->limit(4)->get();
        $data['doctors'] = User::inRandomOrder()->limit(5)->where("role","psychologist")->get();
        $data['sliders'] = Sliders::all()->sortBy("slider_order");
        return view("Public.index")->with('data',$data);
    }

    public function pages($slug){
        $data['page'] = Pages::where("slug",$slug)->first();
        $data['professions'] = Professions::take(6)->get();
        return view("Public.pages")->with('data',$data);
    }
    public function contact(){
        $data['professions'] = Professions::take(6)->get();
        return view("Public.contact")->with('data',$data);
    }
    public function contactForm(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required"
        ]);
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ];
        return "mail sent";
    }
}
