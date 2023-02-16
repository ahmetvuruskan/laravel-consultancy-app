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
    public function getUserDetails($id){
        $user = Users::find($id);
        return response()->json($user);
    }
    public function deleteUser($id){
        Users::find($id)->delete();
        return response()->json(["status"=>"success","message"=>"Kullanıcı başarıyla silindi."]);
    }
}
