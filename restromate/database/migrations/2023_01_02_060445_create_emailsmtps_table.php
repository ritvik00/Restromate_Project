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
        Schema::create('emailsmtp', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('smtphost')->nullable();
            $table->string('smtpport')->nullable();
            $table->string('contenttype')->nullable();
            $table->string('smtpencryption')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('emailsmtp');
    }
};
