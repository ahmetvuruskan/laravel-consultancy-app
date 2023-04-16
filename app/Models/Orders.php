<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
class Orders extends Model
{
    protected $table = "orders";
    use HasFactory;

    public function getMyOrders($user_id)
    {
       return $this->where("$this->table.buyer_id", $user_id)
            ->select(
                "$this->table.*",
                DB::raw("CONCAT(users.name,' ',users.surname) as seller_name"),
                "packages.package_name",
                "start_date as appointment_date",
                "start_time as appointment_time",
                "users.id as seller_id",
                DB::raw("ADDTIME(end_time,'1:00:00') as appointment_end_time"),
            )
            ->leftJoin("appointment", "appointment.id", "=", "orders.order_id")
            ->leftJoin("products", "products.id", "=", "orders.product_id")
            ->leftJoin("users", "users.id", "=", "products.user_id")
            ->leftJoin("professions", "professions.id", "=", "products.id")
            ->leftJoin("packages", "packages.id", "=", "products.package_id")
            ->get();


    }
    public function getSingleOrder($id){
        return $this->where("$this->table.order_id", $id)
            ->leftJoin("products", "products.id", "=", "orders.product_id")
            ->leftJoin("users", "users.id", "=", "products.user_id")
            ->leftJoin("professions", "professions.id", "=", "products.id")
            ->leftJoin("packages", "packages.id", "=", "products.package_id")
            ->first();
    }
    public function getOrderDetailForPdf($id){
        return $this
            ->select("$this->table.*",
                "p.title as seller_title",
                "packages.package_name",
                "packages.package_price",
                "packages.package_description",
                "packages.number_of_sessions",
                "packages.session_duration",
                DB::raw("CONCAT(seller.name,' ',seller.surname) as seller_name"),
                DB::raw("CONCAT(buyer.name,' ',buyer.surname) as buyer_name"),
                "buyer.email as buyer_email",
                "seller.email as seller_email",
                "buyer.phone as buyer_phone",
                "seller.phone as seller_phone",
            )
            ->where("$this->table.order_id", $id)
            ->leftJoin("products", "products.id", "=", "orders.product_id")
            ->leftJoin("users as seller", "seller.id", "=", "products.user_id")
            ->leftJoin("professions", "professions.id", "=", "products.id")
            ->leftJoin("packages", "packages.id", "=", "products.package_id")
            ->leftJoin("users as  buyer", "buyer.id", "=", "orders.buyer_id")
            ->leftJoin("psychologist as p", "seller.id", "=", "p.user_id")
            ->first();
    }
}
