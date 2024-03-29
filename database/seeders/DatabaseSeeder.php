<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Settings;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           SettingsSeeder::class,
            UserSeeder::class,
            ProfessionSeeder::class,
            TitlesSeeder::class,
            SliderSeeder::class,
            BlocksSeeder::class,
            TestsSeeder::class,
        ]);
    }
}
