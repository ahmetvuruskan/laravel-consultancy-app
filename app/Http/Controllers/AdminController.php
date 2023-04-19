<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableTimes;
class AdminController extends Controller
{
    public function index(){
        return view("Dashboard.Admin.index");
    }
    public function psychologistIndex(){
        $times = new AvailableTimes();
        $data['time_status'] = $times->hasTime();
        $data['profile_status'] = 1;
        return view("Dashboard.Psychologist.index")->with("data",$data);
    }
    public function userIndex(){
        return view("Dashboard.Users.index");
    }
}
