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
            ->select($this->table . ".*", "packages.package_name as package_name")
            ->get();
    }

    public function getSingleProduct($id)
    {
        return $this::where("$this->table.id", $id)
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
                "$this->table.id as product_id",
                "users.id as user_id",
            )
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
                "$this->table.id as product_id",
            )
            ->get();
    }

    public function getProductPrice($id, $duration)
    {
        $column = "";
        if ($duration == "30") {
            $column = "thirty_min";
        } else {
            $column = "sixty_min";
        }
        return $this::where("$this->table.id", $id)
            ->select("$this->table.$column as price")
            ->get();
    }
}
