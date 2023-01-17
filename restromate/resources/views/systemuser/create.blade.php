@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>System User @if(@$promo) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('promocode')}}">System User List</a></li>
                    @if(@$promo)
                    <li class="breadcrumb-item active">System User Update</li>
                    @else
                    <li class="breadcrumb-item active">System User Create</li>
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
                    <form method="POST" action="{{ route('systemuser.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="editgroup" name="id" value="{{@$promo->id}}" hidden="">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Message">User Name <span class="validation">*</span></label>
                                        <input id="user_name" type="text"
                                            class="form-control"
                                            name="user_name" value="{{@$promo->user_name}}" autocomplete="user_name"
                                            autofocus placeholder="User Name">

                                        @error('user_name')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="Message">Full Name <span class="validation">*</span></label>
                                        <input id="full_name" type="text"
                                            class="form-control "
                                            name="full_name" value="{{@$promo->full_name}}" autocomplete="full_name"
                                            autofocus placeholder="Full Name">

                                        @error('full_name')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="Message">Email <span class="validation">*</span></label>
                                        <input id="email" type="email" name="email"
                                            class="form-control"
                                            value="{{@$promo->email}}" autocomplete="email" placeholder="Email">

                                        @error('email')
                                        <span style="color:red" role="alert">
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
                                                class="form-control "
                                                name="address" value="{{@$promo->address}}" autocomplete="address"
                                                autofocus placeholder="Address">

                                            @error('address')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="StartDate">Role <span class="validation">*</span></label>
                                            <select class="form-control" id="role_id" name="role_id">
                                                <option disabled="disabled" selected="selected">Choose Role</option>
                                                <option value="2" @if(@$promo->role_id == '2') selected @endif>Admin
                                                </option>
                                                <option value="3" @if(@$promo->role_id == '3') selected
                                                    @endif>Restaurant
                                                </option>
                                            </select>
                                            @error('role_id')
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
                                                <option value="">- -Select Status- -</option>
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

                                    <div class="col-md-4">
                                        <label for="Message">Phone Number <span class="validation">*</span></label>
                                        <input id="phoneno" type="number" name="phoneno"
                                            class="form-control"
                                            min="0" autocomplete="new-phoneno" placeholder="Phone Number"
                                            value="{{@$promo->phoneno}}">

                                        @error('phoneno')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Image 
                                            <span class="validation">*</span>
                                        </label>
                                        <div class="">
                                            <input type="file" name="photo" class="form-control" id="imgInp" >
                                        </div>
                                        <input type="hidden" name="oldphoto" class="form-control"
                                            id="image" placeholder="showphotos" value="{{@$promo->photo}}">
                                            @error('image')
                                            <span style="color:red" role="alert"><strong>{{ $message }}</strong> </span>
                                            @enderror
                                            @error('imgInp')
                                            <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
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


                                    <div class="col-md-4">
                                        @if(@$promo->id != null)

                                        @else
                                        <label for="StartDate">Password <span class="validation">*</span></label>
                                        <input id="password" type="password" name="password"
                                            class="form-control"
                                            autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    @endif

                                </div>
                            </div>
                        </div>





                            <div class="card-footer">
                                @if(@$promo)
                                <button type="submit" class="btn btn-info">Update</button>
                                @else
                                <button type="submit" class="btn btn-info">Submit</button>
                                @endif
                                <a href="{{route('systemuser')}}"><button type="button"
                                        class="btn btn-success">Back</button></a>
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
