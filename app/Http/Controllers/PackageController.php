<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index(){
        $data['packages']=Packages::all();
        return view("Dashboard.Admin.Store.Packages.index")->with("data",$data);
    }
    public function addPackage(){
        return view("Dashboard.Admin.Store.Packages.add");
    }
    public function edit($id){
        $package =Packages::find($id);
        return view("Dashboard.Admin.Store.Packages.edit")->with("package",$package);
    }
    public function insertPackage(Request $request){
        $validator = Validator::make($request->all(),[
           "package_name" => "required",
           "package_description" =>"required",
            "package_price" =>"required|numeric|min:1",
            "number_of_sessions" =>"required|numeric|min:1",
            "session_duration" =>"required|numeric|min:1",
            "package_type" =>"required"
        ],[
            "package_name.required" =>"Lütfen paket ismi giriniz.",
            "package_description.required" =>"Lütfen paket açıklaması giriniz",
            "package_price.*" =>"Lütfen paket fiyatını veya birden büyük bir sayı giriniz",
            "number_of_sessions.*" =>"Lütfen seans sayısını veya birden büyük bir sayı giriniz",
            "session_duration.*" =>"Lütfen  seans süresini veya birden büyük bir sayı giriniz",
            "package_type.required" =>"Lütfen listeden paket tipi seçiniz."
        ]);
        if ($validator->fails()){
            $request->flash();
            return redirect(route("admin.packages.add"))->withErrors($validator);
        }
        $result =Packages::insert([
            "package_name" =>$request->package_name,
            "package_description" =>$request->package_description,
            "package_price" =>$request->package_price,
            "number_of_sessions" =>$request->number_of_sessions,
            "session_duration" =>$request->session_duration,
            "package_type" =>$request->package_type
        ]);
        if ($result){
            return redirect(route("admin.packages.index"));
        }
        return redirect(route("admin.packages.add"))->withErrors($result);
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            "package_name" => "required",
            "package_description" =>"required",
            "package_price" =>"required|numeric|min:1",
            "number_of_sessions" =>"required|numeric|min:1",
            "session_duration" =>"required|numeric|min:1",
            "package_type" =>"required"
        ],[
            "package_name.required" =>"Lütfen paket ismi giriniz.",
            "package_description.required" =>"Lütfen paket açıklaması giriniz",
            "package_price.*" =>"Lütfen paket fiyatını veya birden büyük bir sayı giriniz",
            "number_of_sessions.*" =>"Lütfen seans sayısını veya birden büyük bir sayı giriniz",
            "session_duration.*" =>"Lütfen  seans süresini veya birden büyük bir sayı giriniz",
            "package_type.required" =>"Lütfen listeden paket tipi seçiniz."
        ]);
        if ($validator->fails()){
            $request->flash();
            return redirect(route("admin.packages.edit"))->withErrors($validator);
        }
        $result =Packages::where("id",$id)->update([
            "package_name" =>$request->package_name,
            "package_description" =>$request->package_description,
            "package_price" =>$request->package_price,
            "number_of_sessions" =>$request->number_of_sessions,
            "session_duration" =>$request->session_duration,
            "package_type" =>$request->package_type
        ]);
        if ($result){
            return redirect(route("admin.packages.index"));
        }
        return redirect(route("admin.packages.edit"))->withErrors($result);
    }
    public function delete($id){
        Packages::find($id)->delete();
        return back();
    }
    public function search(Request $request){
        $data[] = [];
        if ($request->has("q")) {
            $search = $request->q;
            $query = Packages::where("package_name", "like", "%$search%")->get();
        }else{
            $query = Packages::all();
        }
        foreach ($query as $item){
            $data[] =[
                'id' => $item->id,
                'text' => $item->package_name
            ];
        }
       return response([
              "results" => $data
       ],200);
    }

}
