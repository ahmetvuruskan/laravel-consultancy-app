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
                "profession_type" => "Adli Psikoloji"
            ],
            [
                "profession_type" => "Aile Terapisi"
            ],
            [
                "profession_type" => "Anksiyete (Kaygı) Bozuklukları"
            ],
            [
                "profession_type" => "Asperger Sendromu"
            ],
            [
                "profession_type" => "Bağımlılık"
            ],
            [
                "profession_type" => "Bipolar Bozukluk"
            ],
            [
                "profession_type" => "Bireysel / Yetişkin Terapisi"
            ],
            [
                "profession_type" => "Cinsel İşlev / İstek / Kimlik Sorunları"
            ],
            [
                "profession_type" => "Cinsel Terapi"
            ],
            [
                "profession_type" => "Çift Terapisi"
            ],
            [
                "profession_type" => "Çocuk ve Ergen Terapisi"
            ],
            [
                "profession_type" => "Depresyon"
            ],
            [
                "profession_type" => "Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)"
            ],
            [
                "profession_type" => "Duygusal İlişki Problemleri"
            ],
              [
                "profession_type" => "Dürtü Kontrol Bozuklukları"
            ],
              [
                "profession_type" => "EMDR"
            ],
              [
                "profession_type" => "English Therapy"
            ],
              [
                "profession_type" => "Fobiler"
            ],
              [
                "profession_type" => "Gebelik Problemleri"
            ],
              [
                "profession_type" => "İletişim Problemleri"
            ],

        ]);
    }
}
