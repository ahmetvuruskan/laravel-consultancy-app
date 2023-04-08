<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Psychologist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index()
    {
        $data['users']= User::all();
        return view("Dashboard.Admin.Users.index")->with("data",$data);
    }
    public function profile(){
        $psychologist = new Psychologist();
        $data['profile'] = $psychologist->getMyProfile();
        return view("Dashboard.Psychologist.profile")->with("data",$data);
    }
    public function updateProfile(Request $request){

        if ($request->hasFile("profile_photo")){
            $fileName = uniqid() . '.' . $request->profile_photo->getClientOriginalExtension();
            $request->profile_photo->move(public_path("/assets/images/"), $fileName);
          $update =  DB::table("users")->where("id",Auth::user()->id)->update([
                "profile"=>$fileName
            ]);
         
        }
        Psychologist::where("user_id",Auth::user()->id)->update([
            "title"=>$request->title,
            "school"=>$request->last_school,
            "description"=>$request->description,
        ]);
        return  redirect(route("psychologist.profile"));
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
    public function makeAdmin(Request $request){
        $user = User::find($request->id);
        $user->role = "admin";
        $user->save();
        return response()->json(["status"=>"success","message"=>"Kullanıcı başarıyla admin olarak güncellendi."]);
    }
    public function makePsychologist(Request $request){
        $user = User::find($request->id);
        $exists = Psychologist::where("user_id",$request->id)->count();
        if($exists==0){
            Psychologist::insert([
                "user_id"=>$request->id,
                "title"=>"Güncellenmedi",
                "slug"=>Str::slug("$user->name"." "."$user->surname"),
                "school"=>"Güncellenmedi",
                "description"=>"Güncellenmedi",
            ]);
        }
        $user->role = "psychologist";
        $user->save();
        return response()->json(["status"=>"success","message"=>"Kullanıcı başarıyla psikolog olarak güncellendi."]);
    }
}
