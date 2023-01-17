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
        Schema::create('paymentmethod', function (Blueprint $table) {
            $table->id();
            $table->enum('paypal', ['on', 'off'])->default('off');
            $table->string('paypal_paymentmode')->nullable();
            $table->string('paypal_businessemail')->nullable();
            $table->string('paypal_currencycode')->nullable();
            $table->string('paypal_notificationurl')->nullable();

            $table->enum('razorpay', ['on', 'off'])->default('off');
            $table->string('razorpay_keyid')->nullable();
            $table->string('razorpay_secretkey')->nullable();
            $table->string('razorpay_webhooksecretkey')->nullable();
            $table->string('razorpay_endpointurl')->nullable();

            $table->enum('paystack', ['on', 'off'])->default('off');
            $table->string('paystack_keyid')->nullable();
            $table->string('paystack_secretkey')->nullable();

            $table->enum('stripe', ['on', 'off'])->default('off');
            $table->string('stripe_paymentmode')->nullable();
            $table->string('stripe_publishkey')->nullable();
            $table->string('stripe_secretkey')->nullable();
            $table->string('stripe_currencycode')->nullable();
            $table->string('stripe_webhooksecretkey')->nullable();
            $table->string('stripe_endpointnurl')->nullable();

            $table->enum('flutterwave', ['on', 'off'])->default('off');
            $table->string('flutterwave_publickey')->nullable();
            $table->string('flutterwave_secretkey')->nullable();
            $table->string('flutterwave_encryptionkey')->nullable();
            $table->string('flutterwave_currencycode')->nullable();

            $table->enum('paytm', ['on', 'off'])->default('off');
            $table->string('paytm_mode')->nullable();
            $table->string('paytm_merchantkey')->nullable();
            $table->string('paytm_merchantid')->nullable();
            $table->string('paytm_website')->nullable();
            $table->string('paytm_industrytypeid')->nullable();

            $table->enum('cod', ['on', 'off'])->default('off');



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
        Schema::dropIfExists('paymentmethod');
    }
};
