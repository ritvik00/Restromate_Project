@extends('layouts.app')
@section('content')
<?php
                $datapermisstion = [];
                $permisstion = permisstion(Auth::user()->id);
                if (!empty($permisstion)) {
                    $datapermisstion = $permisstion;
                }
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Paymentmethod Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Paymentmethod Setting</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('paymentmethod.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="editgroup" name="id" hidden="" value="{{@$payment->id}}">
                            <h4>Paypal Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paypal Payments <span class="validation">*</span></label>
                                    <select name="paypal" class="form-control" id="paypal">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->paypal == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->paypal == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('paypal')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paypal Paymentmode <span class="validation">*</span></label>
                                    <select name="paypal_paymentmode" class="form-control" id="paypal_paymentmode">
                                        <option value="">- -Select Paymentmode- -</option>
                                        <option value="sandbox" @if(@$payment->paypal_paymentmode == 'sandbox') selected @endif>Sandbox (Testing)
                                        </option>
                                        <option value="live" @if(@$payment->paypal_paymentmode == 'live') selected @endif>Live
                                        </option>
                                    </select>
                                    @error('paypal_paymentmode')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paypal Business Email <span class="validation">*</span></label>
                                    <input type="email" name="paypal_businessemail" class="form-control" id="paypal_businessemail"
                                        value="{{@$payment->paypal_businessemail}}" placeholder="Paypal Business Email">
                                    @error('paypal_businessemail')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loactionname">Paypal Currency Code <span class="validation">*</span></label>
                                    <select name="paypal_currencycode" class="form-control" id="paypal_currencycode">
                                        <option value="">- -Select Currency Code- -</option>
                                        <option value="USD" @if(@$payment->paypal_currencycode == 'USD') selected @endif>USD
                                        </option>
                                        <option value="INR" @if(@$payment->paypal_currencycode == 'INR') selected @endif>INR
                                        </option>
                                    </select>
                                    @error('paypal_currencycode')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="loactionname">Paypal Notification Url <span class="validation">*</span></label>
                                    <input type="text" name="paypal_notificationurl" class="form-control" id="paypal_notificationurl"
                                        value="{{@$payment->paypal_notificationurl}}" placeholder="Paypal Notification Url">
                                    @error('paypal_notificationurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <h4>Razorpay Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Razorpay Payments <span class="validation">*</span></label>
                                    <select name="razorpay" class="form-control" id="razorpay">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->razorpay == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->razorpay == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('razorpay')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Razorpay Key Id <span class="validation">*</span></label>
                                    <input type="text" name="razorpay_keyid" class="form-control" id="razorpay_keyid"
                                        value="{{@$payment->razorpay_keyid}}" placeholder="Razorpay Key Id">
                                    @error('razorpay_keyid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Razorpay Secret Key <span class="validation">*</span></label>
                                    <input type="text" name="razorpay_secretkey" class="form-control" id="razorpay_secretkey"
                                        value="{{@$payment->razorpay_secretkey}}" placeholder="Razorpay Secret Key">
                                    @error('razorpay_secretkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loactionname">Razorpay Webhook Secret Key <span class="validation">*</span></label>
                                    <input type="text" name="razorpay_webhooksecretkey" class="form-control" id="razorpay_webhooksecretkey"
                                        value="{{@$payment->razorpay_webhooksecretkey}}" placeholder="Paypal Currency Code">
                                    @error('razorpay_webhooksecretkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="loactionname">Razorpay Endpoint Url <span class="validation">*</span></label>
                                    <input type="text" name="razorpay_endpointurl" class="form-control" id="razorpay_endpointurl"
                                        value="{{@$payment->razorpay_endpointurl}}" placeholder="Razorpay Endpoint Url">
                                    @error('razorpay_endpointurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <h4>Paystack Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paystack Payments <span class="validation">*</span></label>
                                    <select name="paystack" class="form-control" id="paystack">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->paystack == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->paystack == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('paystack')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paystack Key Id <span class="validation">*</span></label>
                                    <input type="text" name="paystack_keyid" class="form-control" id="paystack_keyid"
                                        value="{{@$payment->paystack_keyid}}" placeholder="Paystack Key Id">
                                    @error('paystack_keyid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paystack Secret Key <span class="validation">*</span></label>
                                    <input type="text" name="paystack_secretkey" class="form-control" id="paystack_secretkey"
                                        value="{{@$payment->paystack_secretkey}}" placeholder="Paystack Secret Key">
                                    @error('paystack_secretkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <h4>Stripe Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Stripe Payments <span class="validation">*</span></label>
                                    <select name="stripe" class="form-control" id="stripe">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->stripe == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->stripe == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('stripe')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Stripe Paymentmode <span class="validation">*</span></label>
                                    <select name="stripe_paymentmode" class="form-control" id="stripe_paymentmode">
                                        <option value="">- -Select Paymentmode- -</option>
                                        <option value="sandbox" @if(@$payment->stripe_paymentmode == 'sandbox') selected @endif>Sandbox (Testing)
                                        </option>
                                        <option value="live" @if(@$payment->stripe_paymentmode == 'live') selected @endif>Live
                                        </option>
                                    </select>
                                    @error('stripe_paymentmode')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Stripe Endpoint url <span class="validation">*</span></label>
                                    <input type="text" name="stripe_endpointnurl" class="form-control" id="stripe_endpointnurl"
                                        value="{{@$payment->stripe_endpointnurl}}" placeholder="Stripe Endpoint url">
                                    @error('stripe_endpointnurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="loactionname">Stripe Publish Key <span class="validation">*</span></label>
                                    <input type="text" name="stripe_publishkey" class="form-control" id="stripe_publishkey"
                                        value="{{@$payment->stripe_publishkey}}" placeholder="Stripe Publish Key">
                                    @error('stripe_publishkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="loactionname">Stripe Secret Key <span class="validation">*</span></label>
                                    <input type="text" name="stripe_secretkey" class="form-control" id="stripe_secretkey"
                                        value="{{@$payment->stripe_secretkey}}" placeholder="Stripe Secret Key">
                                    @error('stripe_secretkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="loactionname">Stripe Currency Code <span class="validation">*</span></label>
                                    <select name="stripe_currencycode" class="form-control" id="stripe_currencycode">
                                        <option value="">- -Select Currency Code- -</option>
                                        <option value="USD" @if(@$payment->stripe_currencycode == 'USD') selected @endif>USD
                                        </option>
                                        <option value="INR" @if(@$payment->stripe_currencycode == 'INR') selected @endif>INR
                                        </option>
                                    </select>
                                    @error('stripe_currencycode')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="loactionname">Stripe Webhook Secret Key <span class="validation">*</span></label>
                                    <input type="text" name="stripe_webhooksecretkey" class="form-control" id="stripe_webhooksecretkey"
                                        value="{{@$payment->stripe_webhooksecretkey}}" placeholder="Stripe Webhook Secret Key">
                                    @error('stripe_webhooksecretkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <h4>Flutterwave Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Flutterwave Payments <span class="validation">*</span></label>
                                    <select name="flutterwave" class="form-control" id="flutterwave">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->flutterwave == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->flutterwave == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('flutterwave')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Flutterwave Public Key <span class="validation">*</span></label>
                                    <input type="text" name="flutterwave_publickey" class="form-control" id="flutterwave_publickey"
                                        value="{{@$payment->flutterwave_publickey}}" placeholder="Razorpay Key Id">
                                    @error('flutterwave_publickey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Flutterwave Secret Key <span class="validation">*</span></label>
                                    <input type="text" name="flutterwave_secretkey" class="form-control" id="flutterwave_secretkey"
                                        value="{{@$payment->flutterwave_secretkey}}" placeholder="Flutterwave Secret Key">
                                    @error('flutterwave_secretkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loactionname">Flutterwave Encryption Key <span class="validation">*</span></label>
                                    <input type="text" name="flutterwave_encryptionkey" class="form-control" id="flutterwave_encryptionkey"
                                        value="{{@$payment->flutterwave_encryptionkey}}" placeholder="Flutterwave Encryption Key">
                                    @error('flutterwave_encryptionkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="loactionname">Flutterwave Endpoint Url <span class="validation">*</span></label>
                                    <select name="flutterwave_currencycode" class="form-control" id="flutterwave_currencycode">
                                        <option value="">- -Select Currency Code- -</option>
                                        <option value="USD" @if(@$payment->flutterwave_currencycode == 'USD') selected @endif>USD
                                        </option>
                                        <option value="INR" @if(@$payment->flutterwave_currencycode == 'INR') selected @endif>INR
                                        </option>
                                    </select>
                                    @error('razorpay_endpointurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <h4>Paytm Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paytm Payments <span class="validation">*</span></label>
                                    <select name="paytm" class="form-control" id="paytm">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->paytm == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->paytm == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('paytm')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paytm Public Key <span class="validation">*</span></label>
                                    <select name="paytm_mode" class="form-control" id="paytm_mode">
                                        <option value="">- -Select Paymentmode- -</option>
                                        <option value="sandbox" @if(@$payment->paytm_mode == 'sandbox') selected @endif>Sandbox (Testing)
                                        </option>
                                        <option value="live" @if(@$payment->paytm_mode == 'live') selected @endif>Live
                                        </option>
                                    </select>
                                    @error('paytm_mode')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paytm Merchant Key <span class="validation">*</span></label>
                                    <input type="text" name="paytm_merchantkey" class="form-control" id="paytm_merchantkey"
                                        value="{{@$payment->paytm_merchantkey}}" placeholder="Paytm Merchant Key">
                                    @error('paytm_merchantkey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paytm Merchant Id <span class="validation">*</span></label>
                                    <input type="text" name="paytm_merchantid" class="form-control" id="paytm_merchantid"
                                        value="{{@$payment->paytm_merchantid}}" placeholder="Paytm Merchant Id">
                                    @error('paytm_merchantid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paytm Website <span class="validation">*</span></label>
                                    <input type="text" name="paytm_website" class="form-control" id="paytm_website"
                                        value="{{@$payment->paytm_website}}" placeholder="Paytm Website">
                                    @error('razorpay_endpointurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Paytm Industry Type Id <span class="validation">*</span></label>
                                    <input type="text" name="paytm_industrytypeid" class="form-control" id="paytm_industrytypeid"
                                        value="{{@$payment->paytm_industrytypeid}}" placeholder="Paytm Industry Type Id">
                                    @error('razorpay_endpointurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <h4>Cod Payments</h4>    
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Cod Payments <span class="validation">*</span></label>
                                    <select name="cod" class="form-control" id="cod">
                                        <option value="">- -Select Payments- -</option>
                                        <option value="on" @if(@$payment->cod == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if(@$payment->cod == 'off') selected @endif>OFF
                                        </option>
                                    </select>
                                    @error('cod')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>  

                            


                        @empty(@$datapermisstion->paymentmethodedit == 'on')
                        @else
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        @endempty

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

</script>
<script>
    imgInp1.onchange = evt => {
        const [file] = imgInp1.files
        if (file) {
            blah1.src = URL.createObjectURL(file)
        }
    }

</script>

@endsection
