<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "name" => "Ahmet",
                "surname" =>"Vuruşkan",
                "username" =>"ahmetvuruskan",
                "email"=>"ahmetfatih0702@gmail.com",
                "phone" => "05434432849",
                "password" => bcrypt("123456789"),
            ],
            [
                "name" => "Onurcan",
                "surname" =>"Halkacı",
                "username" =>"onurcanius",
                "email"=>"info@psikologlive.com",
                "phone" => "000000000",
                "password" => bcrypt("123456789"),
            ]
        ]);
    }
}
