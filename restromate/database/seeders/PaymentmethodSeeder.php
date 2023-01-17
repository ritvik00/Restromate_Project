<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PaymentmethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentmethod')->insert([
            'paypal' => 'on',
            'paypal_paymentmode' => 'sandbox',
            'paypal_businessemail' => 'Demo@gmail.com',
            'paypal_currencycode' => 'USD',
            'paypal_notificationurl' => 'restromate.com ',
            'razorpay' => 'on',
            'razorpay_keyid' => 'sand1212121=?box',
            'razorpay_secretkey' => 'fsdfsdfDemo@g',
            'razorpay_webhooksecretkey' => 'USDdsd1212',
            'razorpay_endpointurl' => 'restromate.com ',
            'paystack' => 'on',
            'paystack_keyid' => 'sand1212121=?box',
            'paystack_secretkey' => 'fsdfsdfDemo@g',
            'stripe' => 'on',
            'stripe_paymentmode' => 'sand1212121=?box',
            'stripe_publishkey' => 'fsdfsdfDemo@g',
            'stripe_secretkey' => 'USDdsd1212',
            'stripe_currencycode' => 'USD',
            'stripe_webhooksecretkey' => 'USDdsd1212',
            'stripe_endpointnurl' => 'restromate.com',
            'flutterwave' => 'on',
            'flutterwave_publickey' => 'sand1212121=?box',
            'flutterwave_secretkey' => 'fsdfsdfDemo@g',
            'flutterwave_encryptionkey' => 'USDdsd1212',
            'flutterwave_currencycode' => 'USD',
            'paytm' => 'on',
            'paytm_mode' => 'sandbox',
            'paytm_merchantkey' => 'fsdfsdfDemo@g',
            'paytm_merchantid' => 'USDdsd1212',
            'paytm_website' => 'restromate.com',
            'paytm_industrytypeid' => 'USDdsd1212',
            'cod' => 'on',
            'user_id' => '1',
            'created_at' => now(),
            
        ]);
    }
}
