<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTimes extends Model
{
    use HasFactory;
    protected $table = 'available_times';

    public function getTimebyUserAndDay($user_id,$day){
        $data = $this::select("time_start","time_end")->where("user_id",$user_id)->where("day",$day)->get();
        return $data;
    }
    public function hasTime(){
        $data = $this::select("time_start","time_end")->where("user_id",auth()->user()->id)->get();
        if(count($data) > 0){
            return true;
        }else{
            return false;
        }
    }
}
