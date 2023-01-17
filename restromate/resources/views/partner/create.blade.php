@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Partner @if(@$offer) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('promocode')}}">Partner List</a></li>
                    @if(@$partner)
                    <li class="breadcrumb-item active">Partner Update</li>
                    @else
                    <li class="breadcrumb-item active">Partner Create</li>
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
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('partner.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="editgroup" name="id" value="{{@$partner->id}}" hidden="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Name <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{@$partner->name}}"
                                                        placeholder="Name">
                                                    @error('name')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="StartDate">Type <span
                                                            class="validation">*</span></label>
                                                    <select class="form-control" id="type" name="type">
                                                        <option disabled="disabled" selected="selected">Choose Option
                                                        </option>
                                                        <option value="veg" @if(@$partner->type == 'veg') selected @endif>Veg</option>
                                                        <option value="nonveg" @if(@$partner->type == 'nonveg') selected @endif>Non-Veg</option>
                                                        <option value="both" @if(@$partner->type == 'both') selected @endif>Both</option>
                                                    </select>
                                                    @error('type')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputFile">Profile <span
                                                            class="validation">*</span></label>
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="profile" class="custom-file-input"
                                                                id="imgInp">
                                                            <label class="custom-file-label" for="imgInp">Choose Profile
                                                            </label>
                                                        </div>
                                                        <input type="hidden" name="oldprofile" class="form-control" id="image"
                                                        placeholder="showphotos" value="{{@$partner->profile}}">
                                                        @error('image')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        @error('imgInp')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        <!-- <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="image_sec" style="margin:10px 0px;">
                                                        <img id="blah" style="border: 3px solid #adb5bd !important;
                                                border-radius: 13px !important;" @if(@$partner->profile)
                                                        src="{{ asset('public/images/partner/')}}/{{@$partner->profile}}"
                                                        @else
                                                        src="{{ asset('public/images/employee/no_image.jpg')}}"
                                                        @endif alt="Your Promocode Image"
                                                        width="150px" height="100px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="exampleInputEmail1">Description <span
                                                            class="validation">*</span></label>
                                                    <textarea class="form-control" name="description" id="description"
                                                        rows="4" placeholder="Description">{{@$partner->description}}</textarea>
                                                    @error('description')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="StartDate">City <span
                                                            class="validation">*</span></label>
                                                    <select class="form-control" id="city" name="city">
                                                        <option disabled="disabled" selected="selected">Choose Option
                                                        </option>
                                                        <option value="surat" @if(@$partner->city == 'surat') selected @endif>Surat</option>
                                                        <option value="vadodara" @if(@$partner->city == 'vadodara') selected @endif>Vadodara</option>
                                                        <option value="amdavad" @if(@$partner->city == 'amdavad') selected @endif>Amdavad</option>
                                                    </select>
                                                    @error('type')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Cooking Time <span
                                                            class="validation">*</span>(Enter in
                                                        Minutes)<small></small></label>
                                                    <input type="number" name="cookingtime" class="form-control"
                                                        id="cookingtime" min="0" value="{{@$partner->cookingtime}}"
                                                        placeholder="Food Preparation Time in Minutes">
                                                    @error('cookingtime')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="exampleInputEmail1">Address <span
                                                            class="validation">*</span></label>
                                                    <textarea class="form-control" name="address" id="address" rows="4"
                                                        placeholder="Address">{{@$partner->address}}</textarea>
                                                    @error('address')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputFile">Address Proof <span
                                                            class="validation">*</span></label>
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="addressproof"
                                                                class="custom-file-input" id="imgInp1">
                                                            <label class="custom-file-label" for="imgInp1">Choose Address
                                                                Proof
                                                            </label>
                                                        </div>
                                                        <input type="hidden" name="oldaddressproof" class="form-control" id="image"
                                                        placeholder="showphotos" value="{{@$partner->addressproof}}">
                                                        @error('image')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        @error('imgInp1')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        <!-- <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="image_sec" style="margin:10px 0px;">
                                                        <img id="blah1" style="border: 3px solid #adb5bd !important;
                                                border-radius: 13px !important;" @if(@$partner->addressproof)
                                                        src="{{ asset('public/images/partner/')}}/{{@$partner->addressproof}}"
                                                        @else
                                                        src="{{ asset('public/images/employee/no_image.jpg')}}"
                                                        @endif alt="Your Promocode Image"
                                                        width="150px" height="100px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="PromoCode">Working Days <span
                                                        class="validation">*</span></label>
                                                <div class="form-group">

                                                    <div id="hourForm" class="ml-3">
                                                        <div id="Sunday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Sunday:
                                                            </div>
                                             
                                                            <input type="checkbox" name="not_working_days['Sunday']"
                                                                value="Sunday" class="closed"><span> Open</span>

                                                                <input type="time" id="SundayFromH" name="not_working_days['Sunday']['FromH']"
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="SundayToH" name="not_working_days['Sunday']['ToH']"
                                                                class="hour from mr-2" >
                                                        </div>
                                                        <div id="Monday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Monday:
                                                            </div>
                                                            <input type="checkbox" name="not_working_days['Monday']"
                                                                value="Monday" class="closed"><span> Open</span>
                                                                <input type="time" id="MondayFromH" name="not_working_days['Monday']['FromH'] "
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="MondayToH" name="not_working_days['Monday']['ToH']"
                                                                class="hour from mr-2" >
                                                        </div>
                                                        <div id="Tuesday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Tuesday:
                                                            </div>
                                                            <input type="checkbox" name="not_working_days['Tuesday']"
                                                                value="Tuesday" class="closed"><span> Open</span>
                                                            <input type="time" id="TuesdayFromH" name="not_working_days['Tuesday']['FromH']"
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="TuesdayToH" name="not_working_days['Tuesday']['ToH']"
                                                                class="hour from mr-2" >
                                                            
                                                        </div>
                                                        <div id="Wednesday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Wednesday:
                                                            </div>
                                                            <input type="checkbox" name="not_working_days['Wednesday']"
                                                                value="Wednesday" class="closed"><span> Open</span>

                                                            <input type="time" id="WednesdayFromH" name="not_working_days['Wednesday']['FromH']"
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="WednesdayToH" name="not_working_days['Wednesday']['ToH']"
                                                                class="hour from mr-2" >
                                                            
                                                        </div>
                                                        <div id="Thursday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Thursday:
                                                            </div>
                                                            <input type="checkbox" name="not_working_days['Thursday']"
                                                                value="Thursday" class="closed"><span> Open</span>

                                                            <input type="time" id="ThursdayFromH" name="not_working_days['Thursday']['FromH']"
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="ThursdayToH" name="not_working_days['Thursday']['ToH']"
                                                                class="hour from mr-2" >
                                                            
                                                        </div>
                                                        <div id="Friday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Friday:
                                                            </div>
                                                            <input type="checkbox" name="not_working_days['Friday']"
                                                                value="Friday" class="closed"><span> Open</span>

                                                            <input type="time" id="FridayFromH" name="not_working_days['Friday']['FromH']"
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="FridayToH" name="not_working_days['Friday']['ToH']"
                                                                class="hour from mr-2" >
                                                            
                                                        </div>
                                                        <div id="Saturday" class="day">
                                                            <div id="label" class="col-sm-3 col-form-label">Saturday:
                                                            </div>
                                                            <input type="checkbox" name="not_working_days['Saturday']"
                                                                value="Saturday" class="closed"><span> Open</span>

                                                            <input type="time" id="SaturdayFromH" name="not_working_days['Saturday']['FromH']"
                                                                value="" class="hour from mr-2" >
                                                            to <input type="time" id="SaturdayToH" name="not_working_days['Saturday']['ToH']"
                                                                class="hour from mr-2" >
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('name')
                                                <span style="color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="validation">* Leave blank if there is no change</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="PromoCode">Latitude <span
                                                        class="validation">*</span></label>
                                                <input type="text" name="latitude" class="form-control" id="latitude"
                                                    placeholder="Latitude">
                                                @error('latitude')
                                                <span style="color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="PromoCode">Longitude <span
                                                        class="validation">*</span></label>
                                                <input type="text" name="longitude" class="form-control" id="longitude"
                                                    placeholder="Longitude">
                                                @error('longitude')
                                                <span style="color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div id="map"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Owner Details</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Name <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="owner_name" class="form-control" value="{{@$partner->owner_name}}"
                                                        id="owner_name" placeholder="Restro Owner Name">
                                                    @error('owner_name')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Mobile Number <span
                                                            class="validation">*</span></label>
                                                    <input type="number" name="owner_mobile" class="form-control" value="{{@$partner->owner_mobile}}"
                                                        id="owner_mobile" min="0"
                                                        placeholder="Mobile Number ">
                                                    @error('owner_mobile')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Email <span
                                                            class="validation">*</span></label>
                                                    <input type="email" name="owner_email" class="form-control" value="{{@$partner->owner_email}}"
                                                        id="owner_email" placeholder="Email">
                                                    @error('owner_email')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputFile">National Identity Card <span
                                                            class="validation">*</span></label>
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="owner_identity"
                                                                class="custom-file-input" id="imgInp2">
                                                            <label class="custom-file-label" for="imgInp2">Choose Owner Identity
                                                            </label>
                                                        </div>
                                                        <input type="hidden" name="oldowner_identity" class="form-control" id="image"
                                                        placeholder="showphotos" value="{{@$partner->owner_identity}}">
                                                        @error('image')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        @error('imgInp2')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        <!-- <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="image_sec" style="margin:10px 0px;">
                                                        <img id="blah2" style="border: 3px solid #adb5bd !important;
                                                border-radius: 13px !important; height:70px; width:100px;" @if(@$partner->owner_identity)
                                                        src="{{ asset('public/images/partner/')}}/{{@$partner->owner_identity}}"
                                                        @else
                                                        src="{{ asset('public/images/employee/no_image.jpg')}}"
                                                        @endif alt="Your Promocode Image"
                                                        width="150px" height="100px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                @if(@$partner->id != null)
                                        
                                                @else
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Password <span
                                                            class="validation">*</span></label>
                                                    <input type="password" name="password" class="form-control"  value="{{@$partner->password}}"
                                                        id="password" placeholder="Password">
                                                    @error('password')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Confirm Password <span
                                                            class="validation">*</span></label>
                                                    <input type="password" name="password_confirmation" class="form-control" value="{{@$partner->password}}"
                                                        id="password_confirmation" 
                                                        placeholder="Confirm Password ">
                                                    @error('password_confirmation')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Food Safety Licence</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Licence Name <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="licence_name" class="form-control" value="{{@$partner->licence_name}}"
                                                        id="licence_name" placeholder="Licence Name">
                                                    @error('licence_name')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Licence Code <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="licence_code" class="form-control" value="{{@$partner->licence_code}}"
                                                        id="licence_code" 
                                                        placeholder="Licence Code">
                                                    @error('licence_code')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputFile">Licence Proof<span
                                                            class="validation">*</span></label>
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="licence_proof"
                                                                class="custom-file-input" id="imgInp3">
                                                            <label class="custom-file-label" for="imgInp3">Choose Licence Proof
                                                            </label>
                                                        </div>
                                                        <input type="hidden" name="oldlicence_proof" class="form-control" id="image"
                                                        placeholder="showphotos" value="{{@$partner->licence_proof}}">
                                                        @error('image')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        @error('imgInp3')
                                                        <span style="color:red" role="alert"> {{ $message }} </span>
                                                        @enderror
                                                        <!-- <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="image_sec" style="margin:10px 0px;">
                                                        <img id="blah3" style="border: 3px solid #adb5bd !important;
                                                border-radius: 13px !important;" @if(@$partner->licence_proof)
                                                        src="{{ asset('public/images/partner/')}}/{{@$partner->licence_proof}}"
                                                        @else
                                                        src="{{ asset('public/images/employee/no_image.jpg')}}"
                                                        @endif alt="Your Promocode Image"
                                                        width="150px" height="100px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4>Bank Details</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Tax Name <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="tax_name" class="form-control" value="{{@$partner->tax_name}}"
                                                        id="tax_name" placeholder="Tax Name">
                                                    @error('tax_name')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Tax Number  <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="tax_number" class="form-control" value="{{@$partner->tax_number}}"
                                                        id="tax_number" 
                                                        placeholder="Tax Number ">
                                                    @error('tax_number')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Account Number <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="account_number" class="form-control" value="{{@$partner->account_number}}"
                                                        id="account_number" placeholder="Account Number">
                                                    @error('account_number')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Account Name <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="account_name" class="form-control" value="{{@$partner->account_name}}"
                                                        id="account_name" 
                                                        placeholder="Account Name">
                                                    @error('account_name')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Bank Code <span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="bank_code" class="form-control" value="{{@$partner->bank_code}}"
                                                        id="bank_code" placeholder="Bank Code">
                                                    @error('bank_code')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="PromoCode">Bank Name<span
                                                            class="validation">*</span></label>
                                                    <input type="text" name="bank_name" class="form-control" value="{{@$partner->bank_name}}"
                                                        id="bank_name" 
                                                        placeholder="bank_code">
                                                    @error('bank_name')
                                                    <span style="color:red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
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
                            <a href="{{route('partner')}}"><button type="button"
                                    class="btn btn-success">Back</button></a>
                        </div>

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
<script>
    imgInp2.onchange = evt => {
        const [file] = imgInp2.files
        if (file) {
            blah2.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    imgInp3.onchange = evt => {
        const [file] = imgInp3.files
        if (file) {
            blah3.src = URL.createObjectURL(file)
        }
    }
</script>


<script>
    var working_hours = ''

    $("input[type=checkbox][name='not_working_days[]']").on('change', function () {
        if ($(this).filter(':checked').length == 1) {
            $(this)
                .siblings('input[type=time]')
                .prop('disabled', false)
        } else {
            $(this)
                .siblings('input[type=time]')
                .prop('disabled', true)
        }
    })

    function checkTime(stime, etime) {
        return Date.parse('01/01/1000 ' + stime) < Date.parse('01/01/1000 ' + etime)
    }

    function save_hours(params) {
        var availTuesday = []
        var success = false
        var time_validation = false

        if ($("input[type=checkbox][name='not_working_days[]']:checked").length) {
            $("input[type=checkbox][name='not_working_days[]']:checked").each(
                function () {
                    var day_name_openH = $(this).val() + 'FromH'
                    var open_time = $('#' + day_name_openH).val()
                    console.log('open time: ' + open_time)
                    if (open_time.length) {
                        var day_name_closeH = $(this).val() + 'ToH'
                        var close_time = $('#' + day_name_closeH).val()
                        if (!checkTime(open_time, close_time)) {
                            time_validation = true
                        }
                        availTuesday.push({
                            day: $(this).val(),
                            opening_time: open_time,
                            closing_time: close_time,
                            is_open: 1
                        })
                        $('input[name="working_time"]').val(JSON.stringify(availTuesday))
                        success = false
                    } else {
                        success = true
                    }
                }
            )
            if (success) {
                iziToast.error({
                    message: '<span style="text-transform:capitalize">Please, Select time for working day!</span> '
                })
            }
            if (time_validation) {
                iziToast.error({
                    message: '<span style="text-transform:capitalize">Please, Close time can not laser then open time! Set proper time</span> '
                })
            }
        } else {
            iziToast.error({
                message: '<span style="text-transform:capitalize">Please, Select atleast one day for working!</span> '
            })
        }
    }
    $('.hour ').on('input', function (event) {
        save_hours()
    })
    $('.closed ').on('input', function (event) {
        save_hours()
    })

</script>
@endsection
