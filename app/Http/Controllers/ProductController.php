<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function add(Request $request){
        $validate = Validator::make($request->all(),[
            'package' => 'required',
            'profession' => 'required',
        ],[
            'package.required' => 'Paket seçimi zorunludur',
            'profession.required' => 'Uzmanlık alanı seçimi zorunludur',
        ]);
        if ($validate->fails()){
            return response([
                "status" => "error",
                "message" => $validate->errors()
            ],400);
        }
       $isExists = Products::where("package_id", $request->package)->where("profession_id", $request->profession)->where("user_id", auth('sanctum')->user()->id)->get();
        if ($isExists->count() > 0){
            return response([
                "status" => "error",
                "message" => ["msg"=>"Bu ürün zaten eklenmiş"]
            ],400);
        }else{
            Products::insert([
                "package_id" => $request->package,
                "profession_id" => $request->profession,
                "created_at" => now(),
                "user_id"=>auth('sanctum')->user()->id
            ]);
        }
        return response([
            "status" => "success",
            "message" => "Ürün başarıyla eklendi"
        ],200);
    }
}
