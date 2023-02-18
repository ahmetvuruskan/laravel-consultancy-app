<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("professions")->insert([
            [
                "profession_type" => "Adli Psikoloji",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Aile Terapisi",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Anksiyete (Kaygı) Bozuklukları",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Asperger Sendromu",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Bağımlılık",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Bipolar Bozukluk",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Bireysel / Yetişkin Terapisi",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Cinsel İşlev / İstek / Kimlik Sorunları",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Cinsel Terapi",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Çift Terapisi",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Çocuk ve Ergen Terapisi",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Depresyon",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Duygusal İlişki Problemleri",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Dürtü Kontrol Bozuklukları",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "EMDR",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "English Therapy",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Fobiler",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "Gebelik Problemleri",
                'profession_description' => "lorem ipsum"
            ],
            [
                "profession_type" => "İletişim Problemleri",
                'profession_description' => "lorem ipsum"
            ],

        ]);
    }
}
