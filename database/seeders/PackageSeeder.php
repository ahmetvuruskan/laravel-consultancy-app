<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("packages")->insert([
            [
                "package_name" => "Sesli Görüşme",
                "package_description" => "Sesli görüşme paketi",
                "package_price" => 100,
                "number_of_sessions" => 1,
                "session_duration" => 30,
                "package_type" => "ses",
                "package_status" => "active",
                "created_at" => now(),
            ],
            [
                "package_name" => "Video Görüşme",
                "package_description" => "Video görüşme paketi",
                "package_price" => 150,
                "number_of_sessions" => 1,
                "session_duration" => 30,
                "package_type" => "video",
                "package_status" => "active",
                "created_at" => now(),
            ],
            [
                "package_name" => "Mesaj ile Görüşme",
                "package_description" => "Mesaj görüşme paketi",
                "package_price" => 90,
                "number_of_sessions" => 1,
                "session_duration" => 30,
                "package_type" => "mesaj",
                "package_status" => "active",
                "created_at" => now(),
            ],
        ]);
    }
}
