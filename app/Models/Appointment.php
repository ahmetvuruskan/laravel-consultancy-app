<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment';

    public function getAppointment($specialist_id, $date)
    {
        $data = $this::select("start_time", "end_time")->where("specialist_id", $specialist_id)->where("start_date", $date)->get();
        return $data;
    }

    public function getMyAppointments()
    {
        return $this::join("users", "users.id", "=", "appointment.user_id")
            ->join("products", "products.id", "=", "appointment.product_id")
            ->join("packages", "packages.id", "=", "products.package_id")
            ->where("appointment.specialist_id", Auth::user()->id)
            ->orderBy("appointment.start_date", "asc")
            ->get();
    }
}
