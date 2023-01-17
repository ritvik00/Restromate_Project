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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->integer('PayrollId')->primary();
            $table->integer('EmployeeId');
            $table->integer('RagularHour');
            $table->integer('OverTime');
            $table->integer('Bonus');
            $table->integer('OtherEarning');
            $table->integer('SickPay');
            $table->integer('VacationHours');
            $table->integer('Comission');
            $table->DateTime('PayDate');
            $table->integer('Tax');
            $table->string('IsActive');
            $table->integer('CreatedBy');
            $table->DateTime('CreatedOn');
            $table->integer('ModifiedBy');
            $table->DateTime('ModifiedOn');
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
        Schema::dropIfExists('payrolls');
    }
};
