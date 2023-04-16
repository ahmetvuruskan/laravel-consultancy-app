<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function add(Request $request){

        $validate = Validator::make($request->all(),[
            'package' => 'required',
            'thirty_min'=>'required',
            'sixty_min'=>'required',
        ],[
            'package.required' => 'Paket seçimi zorunludur',
            'thirty_min.required' => '30 dakika fiyatı zorunludur',
            'sixty_min.required' => '60 dakika fiyatı zorunludur',
        ]);
        if ($validate->fails()){
            return response([
                "status" => "error",
                "message" => $validate->errors()
            ],400);
        }
       $isExists = Products::where("package_id", $request->package)->where("user_id", auth('sanctum')->user()->id)->get();
        if ($isExists->count() > 0){
            return response([
                "status" => "error",
                "message" => ["msg"=>"Bu ürün zaten eklenmiş"]
            ],400);
        }else{
            Products::insert([
                "package_id" => $request->package,
                "thirty_min" => $request->thirty_min,
                "sixty_min" => $request->sixty_min,
                "created_at" => now(),
                "user_id"=>auth('sanctum')->user()->id
            ]);
        }
        return response([
            "status" => "success",
            "message" => "Ürün başarıyla eklendi"
        ],200);
    }
    public function delete(Request $request){
        $isExists = Products::where("id", $request->id)->where("user_id", auth('sanctum')->user()->id)->get();
        if ($isExists->count() > 0){
            Products::where("id", $request->id)->delete();
            return response([
                "status" => "success",
                "message" => "Ürün başarıyla silindi"
            ],200);
        }else{
            return response([
                "status" => "error",
                "message" => ["msg"=>"Bu ürün zaten silinmiş"]
            ],400);
        }
    }
    public function getProductsByProfession(Request $request){
        $product = new Products();
        $products =$product->getProductsByProfession($request->profession_type);
        foreach($products as $product){
            $product->package_id = Crypt::encrypt($product->package_id);
            $product->profession_id = Crypt::encrypt($product->profession_id);
            $product->user_id = Crypt::encrypt($product->user_id);
            $product->product_id = Crypt::encrypt($product->product_id);
        }
        return response([
            "status" => "success",
            "data" => $products
        ],200);
    }
    public function getPrices(Request $request){
        $products =Products::where("id",$request->product)->get();
        return response([
            "status" => "success",
            "data" => $products
        ],200);
    }

}
