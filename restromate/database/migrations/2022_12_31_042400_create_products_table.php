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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('tag_id')->nullable();
            $table->string('price')->nullable();
            $table->string('category_id')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('addons_id')->nullable();
            $table->string('attributes_id')->nullable();
            $table->string('producttype')->nullable();
            $table->string('addionalprice')->nullable();
            $table->string('addionalspecialprice')->nullable();
            $table->string('indicator')->nullable();
            $table->string('partner')->nullable();
            $table->string('highlight');
            $table->string('calories')->nullable();
            $table->string('description')->nullable();
            $table->string('allowedorderquantity')->nullable();
            $table->string('minimumorderquantity')->nullable();
            $table->enum('verified', ['active', 'inactive'])->default('inactive');
            $table->enum('cod', ['on', 'off'])->default('off');
            $table->enum('cancelable', ['on', 'off'])->default('off');
            $table->integer('user_id');
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
        Schema::dropIfExists('products');
    }
};
