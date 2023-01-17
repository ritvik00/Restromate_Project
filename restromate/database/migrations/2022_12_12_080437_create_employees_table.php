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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->unique();
            $table->integer('department_id')->unsigned()->nullable();
            $table->enum('is_active', ['1', '0'])->default('1');
            $table->integer('createdby')->unsigned()->nullable();
            $table->integer('modifiedby')->unsigned()->nullable();
            $table->DateTime('date_of_brith');
            $table->text('home')->nullable();
            $table->string('home_no')->nullable();
            $table->string('work_phone')->nullable();
            $table->integer('hourly_rate');
            $table->integer('salary');
            $table->DateTime('start_date');
            $table->integer('last_day_of_work');
            $table->integer('companyid')->unsigned()->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
