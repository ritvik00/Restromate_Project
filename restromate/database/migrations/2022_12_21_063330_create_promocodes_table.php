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
        Schema::create('promocode', function (Blueprint $table) {
            $table->id();
            $table->string('promocode')->unique();
            $table->string('image')->nullable();
            $table->string('message');
            $table->enum('verified', ['active', 'inactive'])->default('inactive');
            $table->DateTime('start_date');
            $table->DateTime('end_date');
            $table->integer('discount');
            $table->string('discount_type')->nullable();
            $table->enum('repeat_use', ['1', '0'])->default('1');
            $table->integer('createdby')->unsigned()->nullable();
            $table->integer('modifiedby')->unsigned()->nullable();
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
        Schema::dropIfExists('promocode');
    }
};
