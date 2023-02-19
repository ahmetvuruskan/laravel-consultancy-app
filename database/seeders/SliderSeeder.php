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
                'slider_text_1' => 'We are here for you',
                'slider_header' => '  What Makes Us Better, Makes You Better.',
                'slider_paragraph' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu lacus ex.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                ipsum dolor sit amet.',
                'button_status' => '1',
                'button_text' => 'Make Appointment',
                'button_link' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slider_image' => 'banner-2.jpg',
                'slider_order' => '1',
            ],
            [
                'slider_text_1' => 'We are here for you',
                'slider_header' => '  What Makes Us Better, Makes You Better.',
                'slider_paragraph' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu lacus ex.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                ipsum dolor sit amet.',
                'button_status' => '1',
                'button_text' => 'Make Appointment',
                'button_link' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slider_image' => 'banner-2.jpg',
                'slider_order' => '2',
            ],
            [
                'slider_text_1' => 'We are here for you',
                'slider_header' => '  What Makes Us Better, Makes You Better.',
                'slider_paragraph' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu lacus ex.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                ipsum dolor sit amet.',
                'button_status' => '1',
                'button_text' => 'Make Appointment',
                'button_link' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slider_image' => 'banner-2.jpg',
                'slider_order' => '3',
            ]
        ]);
    }
}
