<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            [
                'slider-text_1' => 'We are here for you',
                'slider-header' => '  What Makes Us Better, Makes You Better.',
                'slider-paragraph' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu lacus ex.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                ipsum dolor sit amet.',
                'button-status' => '1',
                'button-text' => 'Make Appointment',
                'button-link' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slider-image' => 'banner-2.jpg',
                'slider-order' => '1',
            ],
            [
                'slider-text_1' => 'We are here for you',
                'slider-header' => '  What Makes Us Better, Makes You Better.',
                'slider-paragraph' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu lacus ex.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                ipsum dolor sit amet.',
                'button-status' => '1',
                'button-text' => 'Make Appointment',
                'button-link' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slider-image' => 'banner-2.jpg',
                'slider-order' => '2',
            ],
            [
                'slider-text_1' => 'We are here for you',
                'slider-header' => '  What Makes Us Better, Makes You Better.',
                'slider-paragraph' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu lacus ex.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                ipsum dolor sit amet.',
                'button-status' => '1',
                'button-text' => 'Make Appointment',
                'button-link' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slider-image' => 'banner-2.jpg',
                'slider-order' => '3',
            ]
        ]);
    }
}
