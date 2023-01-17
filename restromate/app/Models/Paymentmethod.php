<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    use HasFactory;
    protected $table='paymentmethod';
    protected $primarykey ='id';
    protected $fillable = [
        'paypal',
        'paypal_paymentmode',
        'paypal_businessemail',
        'paypal_currencycode',
        'paypal_notificationurl',
        'razorpay',
        'razorpay_keyid',
        'razorpay_secretkey',
        'razorpay_webhooksecretkey',
        'razorpay_endpointurl',
        'paystack',
        'paystack_keyid',
        'paystack_secretkey',
        'stripe',
        'stripe_paymentmode',
        'stripe_publishkey',
        'stripe_secretkey',
        'stripe_currencycode',
        'stripe_webhooksecretkey',
        'stripe_endpointnurl',
        'flutterwave',
        'flutterwave_publickey',
        'flutterwave_secretkey',
        'flutterwave_encryptionkey',
        'flutterwave_currencycode',
        'paytm',
        'paytm_mode',
        'paytm_merchantkey',
        'paytm_merchantid',
        'paytm_website',
        'paytm_industrytypeid',
        'cod',
        'user_id'
        
    ];
}
