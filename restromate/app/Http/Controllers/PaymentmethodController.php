<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paymentmethod;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class PaymentmethodController extends Controller
{
    
    public function index()
    {
        $ID= Auth::user()->id;
        $user = Paymentmethod::find($ID);
        return view('paymentmethod.index')->withpayment($user)->with('message', 'Paymentmethod Updated Successfully.');
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $id = Auth::user()->id;

        $request->validate([
            'paypal' => 'required',
            'paypal_paymentmode' => 'required',
            'paypal_businessemail' => 'required',
            'paypal_currencycode' => 'required',
            'paypal_notificationurl' => 'required',
            'razorpay' => 'required',
            'razorpay_keyid' => 'required',
            'razorpay_webhooksecretkey' => 'required',
            'razorpay_endpointurl' => 'required',
            'razorpay_secretkey' => 'required',
            'paystack' => 'required',
            'paystack_keyid' => 'required',
            'paystack_secretkey' => 'required',
            'stripe' => 'required',
            'stripe_paymentmode' => 'required',
            'stripe_publishkey' => 'required',
            'stripe_secretkey' => 'required',
            'stripe_currencycode' => 'required',
            'stripe_webhooksecretkey' => 'required',
            'stripe_endpointnurl' => 'required',
            'flutterwave' => 'required',
            'flutterwave_publickey' => 'required',
            'flutterwave_secretkey' => 'required',
            'flutterwave_encryptionkey' => 'required',
            'flutterwave_currencycode' => 'required',
            'paytm' => 'required',
            'paytm_mode' => 'required',
            'paytm_merchantkey' => 'required',
            'paytm_merchantid' => 'required',
            'paytm_website' => 'required',
            'paytm_industrytypeid' => 'required',
            'cod' => 'required',
        ],
        [
            'paypal.required'=>'This field is required.',
            'paypal_paymentmode.required'=>'This field is required.',
            'paypal_businessemail.required'=>'This field is required.',
            'paypal_notificationurl.required'=>'This field is required.',
            'paypal_currencycode.required'=>'This field is required.',
            'razorpay.required'=>'This field is required.',
            'razorpay_keyid.required'=>'This field is required.',
            'razorpay_secretkey.required'=>'This field is required.',
            'razorpay_webhooksecretkey.required'=>'This field is required.',
            'razorpay_endpointurl.required'=>'This field is required.',
            'paystack.required'=>'This field is required.',
            'paystack_keyid.required'=>'This field is required.',
            'stripe.required'=>'This field is required.',
            'stripe_paymentmode.required'=>'This field is required.',
            'stripe_publishkey.required'=>'This field is required.',
            'stripe_secretkey.required'=>'This field is required.',
            'stripe_currencycode.required'=>'This field is required.',
            'stripe_webhooksecretkey.required'=>'This field is required.',
            'stripe_endpointnurl.required'=>'This field is required.',
            'flutterwave.required'=>'This field is required.',
            'flutterwave_publickey.required'=>'This field is required.',
            'flutterwave_secretkey.required'=>'This field is required.',
            'flutterwave_encryptionkey.required'=>'This field is required.',
            'flutterwave_currencycode.required'=>'This field is required.',
            'paytm.required'=>'This field is required.',
            'paytm_mode.required'=>'This field is required.',
            'paytm_merchantkey.required'=>'This field is required.',
            'paytm_merchantid.required'=>'This field is required.',
            'paytm_website.required'=>'This field is required.',
            'paytm_industrytypeid.required'=>'This field is required.',
            'cod.required'=>'This field is required.',

        ]);

        if($request->id == null){
            $data = $request->all();
            $articledata = Paymentmethod::create([
                'user_id'          =>$id,
                'paypal'           => $data['paypal'],
                'paypal_paymentmode'             => $data['paypal_paymentmode'],
                'paypal_businessemail'          => $data['paypal_businessemail'],
                'razorpay'            => $data['razorpay'],
                'razorpay_keyid'            => $data['razorpay_keyid'],
                'razorpay_secretkey'       => $data['razorpay_secretkey'],
                'paypal_currencycode'          => $data['paypal_currencycode'],
                'paypal_notificationurl'          => $data['paypal_notificationurl'],
                'razorpay_webhooksecretkey'          => $data['razorpay_webhooksecretkey'],
                'razorpay_endpointurl'          => $data['razorpay_endpointurl'],
                'paystack'          => $data['paystack'],
                'paystack_keyid'          => $data['paystack_keyid'],
                'paystack_secretkey'          => $data['paystack_secretkey'],
                'stripe'          => $data['stripe'],
                'stripe_secretkey'          => $data['stripe_secretkey'],
                'stripe_publishkey'          => $data['stripe_publishkey'],
                'stripe_paymentmode'          => $data['stripe_paymentmode'],
                'stripe_currencycode'          => $data['stripe_currencycode'],
                'stripe_webhooksecretkey'          => $data['stripe_webhooksecretkey'],
                'stripe_endpointnurl'          => $data['stripe_endpointnurl'],
                'flutterwave'          => $data['flutterwave'],
                'flutterwave_publickey'           => $data['flutterwave_publickey'],
                'flutterwave_secretkey'           => $data['flutterwave_secretkey'],
                'flutterwave_encryptionkey'           => $data['flutterwave_encryptionkey'],
                'flutterwave_currencycode'           => $data['flutterwave_currencycode'],
                'paytm'           => $data['paytm'],
                'paytm_mode'           => $data['paytm_mode'],
                'paytm_merchantkey'           => $data['paytm_merchantkey'],
                'paytm_merchantid'           => $data['paytm_merchantid'],
                'paytm_website'           => $data['paytm_website'],
                'paytm_industrytypeid'           => $data['paytm_industrytypeid'],
                'cod'           => $data['cod'],

            ]);

            return redirect()->route('paymentmethod')->with('message', 'Paymentmethod Created Successfully.');
        }

        else{

        $firebase = DB::table("paymentmethod")
        ->where("id", $request->id)
        ->update([
            'user_id' => $id,
            'paypal' => $request->paypal,
            'paypal_paymentmode' => $request->paypal_paymentmode,
            'paypal_businessemail' => $request->paypal_businessemail,
            'razorpay' => $request->razorpay,
            'razorpay_keyid' => $request->razorpay_keyid,
            'razorpay_secretkey' => $request->razorpay_secretkey,
            'paypal_currencycode' =>  $request->paypal_currencycode,
            'paypal_notificationurl' =>  $request->paypal_notificationurl,
            'razorpay_webhooksecretkey' =>  $request->razorpay_webhooksecretkey,
            'razorpay_endpointurl' =>  $request->razorpay_endpointurl,
            'paystack' =>  $request->paystack,
            'paystack_keyid' =>  $request->paystack_keyid,
            'paystack_secretkey' =>  $request->paystack_secretkey,
            'stripe' =>  $request->stripe,
            'stripe_paymentmode' =>  $request->stripe_paymentmode,
            'stripe_publishkey' =>  $request->stripe_publishkey,
            'stripe_secretkey' =>  $request->stripe_secretkey,
            'stripe_currencycode' =>  $request->stripe_currencycode,
            'stripe_webhooksecretkey' =>  $request->stripe_webhooksecretkey,
            'stripe_endpointnurl' => $request->stripe_endpointnurl,
            'flutterwave' => $request->flutterwave,
            'flutterwave_publickey' => $request->flutterwave_publickey,
            'flutterwave_secretkey' => $request->flutterwave_secretkey,
            'flutterwave_encryptionkey' => $request->flutterwave_encryptionkey,
            'flutterwave_currencycode' => $request->flutterwave_currencycode,
            'paytm' => $request->paytm,
            'paytm_mode' => $request->paytm_mode,
            'paytm_merchantkey' => $request->paytm_merchantkey,
            'paytm_merchantid' => $request->paytm_merchantid,
            'paytm_website' => $request->paytm_website,
            'paytm_industrytypeid' => $request->paytm_industrytypeid,
            'cod' => $request->cod
        ]);

        return redirect()->route('paymentmethod')->with('message', 'Paymentmethod Setting Updated Successfully.');
    }
    }

}
