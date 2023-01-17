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
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('featuredimage')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_dec')->nullable();
            $table->text('meta_key')->nullable();
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
        Schema::dropIfExists('cms');
    }
};
