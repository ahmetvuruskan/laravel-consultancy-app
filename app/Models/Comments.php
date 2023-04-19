<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";

    public function getUserComment($slug)
    {
        return $this::join("psychologist", "psychologist.user_id", "=", "comments.user_id")
            ->select("comments.comment",)
            ->where("psychologist.slug", $slug)
            ->where("comments.status", "approved")
            ->get();
    }

    public  function getAll()
    {
        return $this::join("psychologist", "psychologist.user_id", "=", "comments.user_id")
            ->select("comments.comment","comments.id", "comments.status",DB::raw("CONCAT(users.name,' ',users.surname) as full_name"))
            ->join("users", "users.id", "=", "psychologist.user_id")
            ->orderBy("comments.id", "desc")
            ->get();
    }

}
