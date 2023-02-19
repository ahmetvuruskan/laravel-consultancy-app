<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("blocks")->insert([
            [
                "header" => "Specialised Service",
                "paragraph" => "Lorem ipsum dolor sit",
                "icon" => "service-icon8.png",
                "color" => "blue",
            ],
            [
                "header" => "24/7 Advanced Care",
                "paragraph" => "Lorem ipsum dolor sit",
                "icon" => "service-icon9.png",
                "color" => "green",
            ],
            [
                "header" => "Get Result Online",
                "paragraph" => "Lorem ipsum dolor sit",
                "icon" => "service-icon10.png",
                "color" => "yellow",
            ]
        ]);
    }
}
