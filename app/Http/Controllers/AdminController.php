<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("Dashboard.Admin.index");
    }
    public function psychologistIndex(){
        return view("Dashboard.Psychologist.index");
    }
    public function userIndex(){
        return view("Dashboard.Users.index");
    }
}
