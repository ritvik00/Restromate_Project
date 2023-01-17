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
        Schema::create('offers__management', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('type_id')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('user_id')->nullable();
            $table->enum('verified', ['active', 'inactive'])->default('inactive');
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
        Schema::dropIfExists('offers__management');
    }
};
