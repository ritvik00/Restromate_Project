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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('profile')->nullable();
            $table->text('workingdays')->nullable();
            $table->string('description')->nullable();
            $table->string('city')->nullable();
            $table->string('cookingtime')->nullable();
            $table->string('address')->nullable();
            $table->string('addressproof')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_mobile')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('password')->nullable();
            $table->enum('verified', ['active', 'inactive'])->default('inactive');
            $table->string('owner_identity')->nullable();
            $table->string('licence_name')->nullable();
            $table->string('licence_code')->nullable();
            $table->string('licence_proof')->nullable();
            $table->enum('licence_approval', ['approved', 'not_approved'])->default('not_approved');
            $table->string('tax_name')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
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
        Schema::dropIfExists('partners');
    }
};
