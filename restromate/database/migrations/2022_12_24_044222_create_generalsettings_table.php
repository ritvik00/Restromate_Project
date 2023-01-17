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
        Schema::create('generalsetting', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('sitetitle')->nullable();
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->text('copyright')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->text('mapiframe')->nullable();
            $table->string('siteimage')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('faviconimage')->nullable();
            $table->text('metakeywords')->nullable();
            $table->text('metadescription')->nullable();
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
        Schema::dropIfExists('generalsetting');
    }
};
