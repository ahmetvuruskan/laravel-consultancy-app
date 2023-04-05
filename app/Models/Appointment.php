<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';

    public function getAppointment($specialist_id,$date){
        $data = $this::select("start_time","end_time")->where("specialist_id",$specialist_id)->where("start_date",$date)->get();
        return $data;
    }
}
