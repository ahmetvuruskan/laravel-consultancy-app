<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function getProdcuts($id){
        return $this::where("user_id",$id)
            ->join("packages","packages.id","=","products.package_id")
            ->join("professions","professions.id","=","products.profession_id")
            ->select("products.id","packages.package_name as package_name","professions.profession_type as profession_name")
            ->orderBy("professions.profession_type","ASC")
            ->get();
    }
}
