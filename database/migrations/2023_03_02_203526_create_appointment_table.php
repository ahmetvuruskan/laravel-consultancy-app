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

        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->integer("product_id");
            $table->date("start_date");
            $table->time("start_time");
            $table->date("end_date");
            $table->time("end_time");
        });
    }
// yada önce kullanıcıların satın alımlarını tutan tabloyu yapalım yada bu tabloda yapabilir miyiz acaba  ?
// githubun copilot adlı yapay zekası şkım anlat tabloya ne eklicez düşünüyorum aşkım bu hali ile bi dursun uygulayalım sonra düzenleriz
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
};
