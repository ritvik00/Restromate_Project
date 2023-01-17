@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Update Profile</li>
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
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('updateprofile') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name 
                                            {{-- <span class="validection">*</span> --}}
                                        </label>
                                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" placeholder="Name"
                                            value="{{@$userdata->user_name}}">
                                        @error('name')
                                        <span class="validection">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Image 
                                        <span class="validation">*</span>
                                    </label>
                                    <div class="">
                                        <input type="file" name="photo" class="form-control" id="imgInp" >
                                    </div>
                                    <input type="hidden" name="oldphoto" class="form-control"
                                        id="image" placeholder="showphotos" value="{{@$userdata->photo}}">
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
                                        border-radius: 13px !important;" @if(@$userdata->photo)
                                        src="{{ asset('public/uploads/user/')}}/{{@$userdata->photo}}"
                                        @else
                                        src="{{ asset('public/images/employee/no_image.jpg')}}"
                                        @endif alt="your User image"
                                        width="150px" height="120px" />
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Retype Password <span
                                                class="validection">*</span> </label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                            placeholder="Retype password">
                                        @error('password_confirmation')
                                        <span class="validection">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> -->
                            <br />


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="Submit">Submit</button>
                                {{-- <a href="">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        Back
                                    </button>
                                </a> --}}


                            </div>

                        </div>

                    </form>
                </div>
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
