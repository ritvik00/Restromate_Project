@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Waiter @if(@$waiter) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('waiter')}}">Waiter List</a></li>
                    @if(@$waiter)
                    <li class="breadcrumb-item active">Waiter Update</li>
                    @else
                    <li class="breadcrumb-item active">Waiter Create</li>
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
                    <form method="POST" action="{{ route('waiter.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <input type="editgroup" name="id" value="{{@$waiter->id}}" hidden="">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="loactionname">Name <span class="validation">*</span></label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Name" value="{{@$waiter->name}}">
                            @error('name')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="loactionname">Email <span class="validation">*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Email" value="{{@$waiter->email}}">
                            @error('email')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="loactionname">Phone Number <span class="validation">*</span></label>
                            <input type="number" name="phone" class="form-control" id="phone"
                                placeholder="Phone Number" value="{{@$waiter->phone}}">
                            @error('phone')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="loactionname">Start Date <span class="validation">*</span></label>
                            <?php if(!empty($waiter->start_date))
                                        {
                                            $orgDate = $waiter->start_date;
                                            $newDate = date("Y-m-d", strtotime($orgDate));
                                        }

                                        ?>
                            <input type="date" name="start_date" class="form-control" id="start_date"
                                placeholder="Restaurant Name" value="{{@$newDate}}">
                            @error('start_date')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group col-md-4">
                            <label for="loactionname">Restaurant Name <span class="validation">*</span></label>
                            <input type="text" name="restaurant_name" class="form-control" id="restaurant_name"
                                placeholder="Restaurant Name" value="{{@$waiter->restaurant_name}}">
                            @error('restaurant_name')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                            <div class="row">
                                <div class="form-group col-md-3">

                                    <label for="exampleInputFile">Image <span class="validation">*</span></label>
                                    <div class="form-group">
                                        <div class="">
                                            <input type="file" name="image" class="form-control" id="imgInp" >
                                        </div>
                                        <input type="hidden" name="oldimage" class="form-control"
                                            id="image" placeholder="showphotos"
                                            value="{{@$waiter->image}}">
                                            @error('image')
                                            <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                            @error('imgInp')
                                            <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        <!-- <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div> -->
                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <img id="blah" style="border: 3px solid #adb5bd !important;
                                    border-radius: 13px !important;" @if(@$waiter->image)
                                    src="{{ asset('public/images/waiter/')}}/{{@$waiter->image}}"
                                    @else
                                    src="{{ asset('public/images/employee/no_image.jpg')}}"
                                    @endif alt="Your Waiter Image"
                                    width="200px" height="150px" />
                                </div>
                            </div>
                        

                       
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @if(@$waiter)
                        <button type="submit" class="btn btn-info">Update</button>
                        @else
                        <button type="submit" class="btn btn-info">Submit</button>
                        @endif
                        <a href="{{route('waiter')}}"><button type="button" class="btn btn-success">Back</button></a>
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
@endsection
