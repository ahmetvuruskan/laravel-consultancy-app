<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Termwind\Components\Raw;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvailableUsers()
    {
        $products = new Products();

        $days = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];
        $todayRaw = Carbon::now();
        $today = $days[$todayRaw->format("w")];
        $time = $todayRaw->format("H:i");
        $user_data = $this::select(
            "profile",
            "users.id",
            "slug",
            DB::raw("CONCAT($this->table.name,' ',$this->table.surname) as fullname"),
            "psychologist.title",
            "psychologist.school",
            "psychologist.slug",
            "psychologist.description")
            ->join("psychologist", "psychologist.user_id", "=", "$this->table.id")
            ->join("available_times", "available_times.user_id", "=", "$this->table.id")
            ->where('time_end', '>=', $time)
            ->where('time_start', '<=', $time)
            ->where("day", $today)
            ->get();
        foreach ($user_data as $user) {
            $user->products = $products->getProdcuts($user->id);
        }
        return $user_data;
    }
    public function getUsers(){
        $days = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];
        $todayRaw = Carbon::now();
        $today = $days[$todayRaw->format("w")];
        $products = new Products();
        $todayRaw = Carbon::now();
        $time = $todayRaw->format("H:i");
        $user_data = $this::select(
            "profile",
            "users.id",
            "slug",
            DB::raw("CONCAT($this->table.name,' ',$this->table.surname) as fullname"),
            "psychologist.title",
            "psychologist.school",
            "psychologist.slug",
            "psychologist.description")
            ->join("psychologist", "psychologist.user_id", "=", "$this->table.id")
            ->join("available_times", "available_times.user_id", "=", "$this->table.id")
            ->where('time_end', '<=', $time)
            ->where("day", $today)
            ->get();
        foreach ($user_data as $user) {
            $user->products = $products->getProdcuts($user->id);
        }
        return $user_data;
    }
    public function getSinglePsychologist($where){
        return  $this::join("psychologist", "psychologist.user_id", "=", "$this->table.id")
            ->where($where)
            ->first();
    }

}
