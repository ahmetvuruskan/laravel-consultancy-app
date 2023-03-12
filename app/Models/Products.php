<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";

    public function getProdcuts($id)
    {
        return $this::where("user_id", $id)
            ->join("packages", "packages.id", "=", "products.package_id")
            ->join("professions", "professions.id", "=", "products.profession_id")
            ->select("products.id", "packages.package_name as package_name", "professions.profession_type as profession_name")
            ->orderBy("professions.profession_type", "ASC")
            ->get();
    }

    public function getProductsByProfession($profession)
    {
        return $this::where("professions.profession_type", $profession)
            ->join("packages", "packages.id", "=", "$this->table.package_id")
            ->join("professions", "professions.id", "=", "$this->table.profession_id")
            ->join("users", "users.id", "=", "$this->table.user_id")
            ->select("packages.package_name as package_name",
                "packages.id as package_id",
                "packages.package_price as package_price",
                "users.profile as profile",
                "packages.session_duration as session_duration",
                "packages.number_of_sessions as number_of_sessions",
                DB::raw("CONCAT(users.name,' ',users.surname) as user_fullname"),
                "professions.profession_type as profession_name",
                "professions.id as profession_id",
                "professions.profession_description as profession_description",
                "$this->table.*"
            )
            ->get();
    }
}
