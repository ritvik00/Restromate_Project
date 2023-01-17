@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Compnay update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('compnay')}}">Compnay list</a></li>
                    <li class="breadcrumb-item active">Compnay update</li>
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
                    <form method="POST" action="{{ route('compnay.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{@$users->id}}"/>

                        <div class="card-body">
                        <div class="form-group">
                                <label for="companyname">Company Name </label>
                                <input type="text" name="user_name" class="form-control" id="companyname" 
                                    placeholder="Company Name" value="{{@$users->user_name}}">
                                    @error('user_name')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Company Email</label>
                                <input type="email"  name ="email" class="form-control" id="email"
                                    placeholder="Company Email" value="{{@$users->email}}" readonly >
                                    @error('email')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Company Phone Number</label>
                                <input type="number" name="phoneno" class="form-control" id="phone"
                                    placeholder="Company Phone Number" value="{{@$users->phoneno}}">
                                    @error('phoneno')
                                    <span style="color:red"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Company Address</label>
                                <textarea class="form-control"  name="address" id="address" placeholder="Company Address">{{@$users->address}}</textarea>
                                @error('address')
                                    <span style="color:red"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>



@endsection