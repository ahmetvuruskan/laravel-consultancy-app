<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data['users']= User::all();
        return view("Dashboard.Admin.Users.index")->with("data",$data);
    }
    public function getUserDetails(Request $request){
        Validator::make($request->all(), [
            'id' => "required|numeric"
        ],[
            'id.required' =>"Lütfen kullanıcı id'sini giriniz.",
            'id.numeric' =>"Lütfen geçerli bir kullanıcı id'si giriniz."
        ]);
        $user = User::find($request->id);
        return response()->json($user);
    }
    public function deleteUser($id){
        User::find($id)->delete();
        return response()->json(["status"=>"success","message"=>"Kullanıcı başarıyla silindi."]);
    }
}
