@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Delivery Boy @if(@$promo) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('promocode')}}">Delivery Boy List</a></li>
                    @if(@$promo)
                    <li class="breadcrumb-item active">Delivery Boy Update</li>
                    @else
                    <li class="breadcrumb-item active">Delivery Boy create</li>
                    @endif
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
                    <form method="POST" action="{{ route('rider.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="editgroup" name="id" value="{{@$promo->id}}" hidden="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Message">User Name <span class="validation">*</span></label>
                                        <input id="user_name" type="text"
                                            class="form-control @error('user_name') is-invalid @enderror"
                                            name="user_name" value="{{@$promo->user_name}}" autocomplete="user_name"
                                            autofocus placeholder="User Name">

                                        @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="Message">Full Name <span class="validation">*</span></label>
                                        <input id="full_name" type="text"
                                            class="form-control @error('full_name') is-invalid @enderror"
                                            name="full_name" value="{{@$promo->full_name}}" autocomplete="full_name"
                                            autofocus placeholder="Full Name">

                                        @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="Message">Email <span class="validation">*</span></label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{@$promo->email}}" autocomplete="email" placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image <span class="validation">*</span>
                                                {{-- <span class="validection">*</span> --}}
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input" id="imgInp">
                                                <label class="custom-file-label" for="imgInp">Choose User Image</label>
                                            </div>
                                            <input type="hidden" name="oldphoto" class="form-control" id="photo"
                                                placeholder="showphotos" value="{{@$promo->photo}}">
                                            @error('photo')
                                            <span style="color:red" role="alert"> {{ $message }} </span>
                                            @enderror
                                            @error('imgInp')
                                            <span style="color:red" role="alert"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">

                                        <div class="image_sec" style="margin:10px 0px;">
                                            <img id="blah" style="border: 3px solid #adb5bd !important;
                                            border-radius: 13px !important;" @if(@$promo->photo)
                                            src="{{ asset('public/uploads/user/')}}/{{@$promo->photo}}"
                                            @else
                                            src="{{ asset('public/images/employee/no_image.jpg')}}"
                                            @endif alt="your User image"
                                            width="150px" height="120px" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="StartDate">Commission Methods <span
                                                    class="validation">*</span></label>
                                            <select class="form-control" id="commision_method" name="commision_method">
                                                <option disabled="disabled" selected="selected">Choose Commision Method
                                                </option>
                                                <option value="1" @if(@$promo->commision_method == '1') selected
                                                    @endif>Percentage on Delivery Charges
                                                </option>
                                                <option value="2" @if(@$promo->commision_method == '2') selected
                                                    @endif>Fixed Commission per Order
                                                </option>

                                            </select>
                                            @error('commision_method')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status <span
                                                    class="validation">*</span></label>
                                            <select name="is_active" class="form-control" id="is_active">
                                                <option value="">- -Select Active- -</option>
                                                <option value="1" @if(@$promo->is_active == '1') selected @endif>Active
                                                </option>
                                                <option value="0" @if(@$promo->is_active == '0') selected
                                                    @endif>Inactive
                                                </option>
                                            </select>
                                            @error('is_active')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="Message">Phone Number <span class="validation">*</span></label>
                                        <input id="phoneno" type="number"
                                            class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"
                                            min="0" autocomplete="new-phoneno" placeholder="Phone Number"
                                            value="{{@$promo->phoneno}}">

                                        @error('phoneno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="StartDate">Address <span class="validation">*</span></label>
                                            <input id="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                name="address" value="{{@$promo->address}}" autocomplete="address"
                                                autofocus placeholder="Address">

                                            @error('address')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @if(@$promo->id != null)

                                    @else
                                    <div class="col-md-4">
                                       
                                        <label for="StartDate">Password <span class="validation">*</span></label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                       
                                    </div>
                                    @endif

                                   

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="StartDate">Serviceble City <span class="validation">*</span></label>
                                            <select class="form-control" id="serviceble_city" name="serviceble_city">
                                                <option disabled="disabled" selected="selected">Choose Serviceble City</option>
                                                <option value="surat" @if(@$promo->serviceble_city == 'surat') selected @endif>Surat
                                                </option>
                                                <option value="ahmedabad" @if(@$promo->serviceble_city == 'ahmedabad') selected @endif>Ahmedabad
                                                </option>
                                               
                                            </select>
                                            @error('commision_method')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                            <div class="card-footer">
                                @if(@$promo)
                                <button type="submit" class="btn btn-info">Update</button>
                                @else
                                <button type="submit" class="btn btn-info">Submit</button>
                                @endif
                                <a href="{{route('rider')}}"><button type="button"
                                        class="btn btn-success">Back</button></a>
                            </div>
                        </div>
                </div>
                <!-- /.col -->
                </form>
                {{-- <a href="{{route('login')}}" class="text-center">I already have a membership</a> --}}
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
@endsection
