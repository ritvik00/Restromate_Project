@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Update Password</li>
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


                    <form action="{{ route('chnagepassword_update') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="text" name="id" value="{{@$user->id}}" hidden="">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Old password
                                             {{-- <span class="validection">*</span> --}}
                                        </label>
                                        <input type="password" class="form-control @error('old') is-invalid @enderror" name="old" value="{{ old('old') }}"
                                            placeholder="Old Password">
                                        @error('old')
                                        <span class="validection">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">New password
                                             {{-- <span class="validection">*</span> --}}
                                        </label>
                                        <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="New Password">
                                        @error('password')
                                        <span class="validection">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Retype Password 
                                            {{-- <span class="validection">*</span>  --}}
                                            </label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                            placeholder="Retype password">
                                        @error('password_confirmation')
                                        <span class="validection">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><br />


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="Submit">Submit</button>
                                {{-- <a href="{{route('customer_home')}}">
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



@endsection
