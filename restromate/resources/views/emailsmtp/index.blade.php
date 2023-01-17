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
                <h1>Email SMTP Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Email SMTP Settings</li>
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
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('emailsmtp.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="editgroup" name="id" hidden="" value="{{@$smtp->id}}">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loactionname">Email <span class="validation">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{@$smtp->email}}" placeholder="Email">
                                        <small>This Is the email address that the contact and report emails will be sent to, aswell as being the from address In signup and notification emails. </small>
                                    @error('email')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="loactionname">Password <span class="validation">*</span></label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        value="{{@$smtp->password}}" placeholder="Password">
                                        <small>Password of above given email.</small>
                                    @error('password')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="form-group col-md-6">
                                    <label for="loactionname">Smtp Host <span class="validation">*</span></label>
                                    <input type="text" name="smtphost" class="form-control" id="smtphost"
                                        value="{{@$smtp->smtphost}}" placeholder="Smtp Host">
                                        <small>This is the host address for your smtp server, this is only needed it you are using SMTP os the email Send Type. </small>
                                    @error('smtphost')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="loactionname">Smtp Port <span class="validation">*</span></label>
                                    <input type="text" name="smtpport" class="form-control" id="smtpport"
                                        value="{{@$smtp->smtpport}}" placeholder="Smtp Port">
                                        <small> SMTP pod this will provide your service provider.  </small>
                                    @error('smtpport')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loactionname">Content Type <span class="validation">*</span></label>
                                    <select name="contenttype" class="form-control" id="contenttype">
                                        <option value="">- -Select Category- -</option>
                                        <option value="html" @if(@$smtp->contenttype == 'html') selected @endif>Html
                                        </option>
                                        <option value="messagebox" @if(@$smtp->contenttype == 'messagebox') selected @endif>Message-Box
                                        </option>
                                        <option value="other" @if(@$smtp->contenttype == 'other') selected @endif>Other
                                        </option>
                                    </select>
                                    <small> Text-plain or H1ML content chooser. </small>
                                    @error('contenttype')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="loactionname">Smtp Encryption <span class="validation">*</span></label>
                                    <select name="smtpencryption" class="form-control" id="smtpencryption">
                                        <option value="">- -Select Category- -</option>
                                        <option value="ssl" @if(@$smtp->smtpencryption == 'ssl') selected @endif>SSL
                                        </option>
                                        <option value="tls" @if(@$smtp->smtpencryption == 'tls') selected @endif>TLS
                                        </option>
                                    </select>
                                    <small>If your e-mail service provider supported secure connections, you can choose security method on list. </small>
                                    @error('smtpencryption')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @empty(@$datapermisstion->emailsmtpedit == 'on')
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
