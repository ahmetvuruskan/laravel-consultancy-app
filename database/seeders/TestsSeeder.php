<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tests")->insert([
            [
                "name"=>"Deneme",
                "description"=>"Deneme Açıklaması",
                "test_embed"=>'<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdcq_1f4oAJl5nv7ty6isqzAkmMLhiHwHgsev-ml0ju2ceCdA/viewform?embedded=true" width="640" height="759" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>',
                "created_at"=>now(),
            ],
            [
                "name"=>"Deneme",
                "description"=>"Deneme Açıklaması",
                "test_embed"=>'<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdcq_1f4oAJl5nv7ty6isqzAkmMLhiHwHgsev-ml0ju2ceCdA/viewform?embedded=true" width="640" height="759" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>',
                "created_at"=>now(),
            ],
            [
                "name"=>"Deneme",
                "description"=>"Deneme Açıklaması",
                "test_embed"=>'<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdcq_1f4oAJl5nv7ty6isqzAkmMLhiHwHgsev-ml0ju2ceCdA/viewform?embedded=true" width="640" height="759" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>',
                "created_at"=>now(),
            ],
            [
                "name"=>"Deneme",
                "description"=>"Deneme Açıklaması",
                "test_embed"=>'<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdcq_1f4oAJl5nv7ty6isqzAkmMLhiHwHgsev-ml0ju2ceCdA/viewform?embedded=true" width="640" height="759" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>',
                "created_at"=>now(),
            ],

        ]);
    }
}
