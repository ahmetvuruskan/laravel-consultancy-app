<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("slider_text_1");
            $table->string("slider_header");
            $table->string("slider_paragraph");
            $table->boolean("button_status");
            $table->string("button_text");
            $table->string("button_link");
            $table->string("slider_image");
            $table->integer("slider_order");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
