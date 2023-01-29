<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("titles")->insert([
            [
                "title_name" => "Aile Danışmanı"
            ],
            [
                "title_name" => "Cinsel Terapist"
            ],
            [
                "title_name" => "Çift Terapisti"
            ],
            [
                "title_name" => "Çocuk ve Ergen Psikologu"
            ],
            [
                "title_name" => "Diyetisyen"
            ],
            [
                "title_name" => "Fizyoterapist"
            ],
            [
                "title_name" => "Psikolog"
            ],
            [
                "title_name" => "Klinik Psikolog"
            ],
            [
                "title_name" => "Uzman Nöropsikolog"
            ],
            [
                "title_name" => "Uzman Psikolog"
            ],
            [
                "title_name" => "Uzman Psikolojik Danışman"
            ],
            [
                "title_name" => "Uzman Yoga Eğitmeni"
            ],
        ]);
    }
}
