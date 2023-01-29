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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("package_name");
            $table->string("package_description");
            $table->integer("package_price");
            $table->string("number_of_sessions")->default("1");
            $table->string("session_duration");
            $table->enum("package_type",["video","ses","mesaj"]);
            $table->enum("package_status",['active',"passive"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
