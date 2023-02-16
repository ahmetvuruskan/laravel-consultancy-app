<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['users']= Users::all();
        return view("Dashboard.Admin.Users.index")->with("data",$data);
    }
}
