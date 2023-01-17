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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('full_name');
            $table->text('address')->nullable();
            $table->string('phoneno')->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->enum('is_active', ['1', '0'])->default('1');
            $table->string('lastlogin')->nullable();
            $table->enum('verified', ['active', 'inactive'])->default('inactive');
            $table->string('commision_method')->nullable();
            $table->string('serviceble_city')->nullable();
            $table->integer('createdby')->unsigned()->nullable();
            $table->integer('modifiedby')->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
