<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Psychologist extends Model
{
    use HasFactory;
    protected $table = 'psychologist';

    public function getMyProfile(){
        return $this::where("user_id",Auth::user()->id)->first();
    }
}
