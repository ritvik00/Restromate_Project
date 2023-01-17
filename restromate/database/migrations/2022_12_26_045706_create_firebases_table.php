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
        Schema::create('firebase', function (Blueprint $table) {
            $table->id();
            $table->string('apikey')->nullable();
            $table->string('user_id')->nullable();
            $table->string('authdomain')->nullable();
            $table->string('databaseurl')->nullable();
            $table->string('projectid')->nullable();
            $table->string('storagebucket')->nullable();
            $table->string('messagingsenderid')->nullable();
            $table->string('appid')->nullable();
            $table->string('measurementid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firebase');
    }
};
