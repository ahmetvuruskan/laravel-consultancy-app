<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";

    public function getUserComment($slug)
    {
        return $this::join("psychologist", "psychologist.user_id", "=", "comments.user_id")

            ->select("comments.comment",)
            ->where("psychologist.slug", $slug   )
            ->where("comments.status", "approved")
            ->get();
    }
}
