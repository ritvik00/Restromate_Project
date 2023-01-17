@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Notification @if(@$promo) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('notification')}}">Notification List</a></li>
                    @if(@$promo)
                    <li class="breadcrumb-item active">Notification Update</li>
                    @else
                    <li class="breadcrumb-item active">Notification Create</li>
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
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('notification.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <input type="editgroup" name="id" hidden="" value="{{@$promo->id}}">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="name">Type <span class="validation">*</span></label>
                                    <select class="form-control" id="type" name="type" onchange="changeFunc();">
                                        <option disabled="disabled" selected="selected">Choose Option</option>
                                        <option value="default" @if(@$promo->type == 'default') selected @endif >Default
                                        </option>
                                        <option id="category" value="category" @if(@$promo->type == 'category') selected
                                            @endif >Category
                                        </option>
                                    </select>
                                    @error('type')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col" id="category_id" @if(@$promo->type == 'category') style="display: block;" @else style="display: none;" @endif >
                                    <label for="name">Category <span class="validation">*</span></label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option disabled="disabled" selected="selected">Choose Option</option>
                                        @forelse(@$cat as $at)
                                        <option value='{{@$at->id}}' @if(@$at->id == @$promo->category_id)
                                            selected @endif>{{@$at->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                            </div>


                            <div class="row">

                                <div class="form-group col-md-5">
                                    <label for="StartDate">Title <span class="validation">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                                        value="{{@$promo->title}}">
                                    @error('title')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputFile">Image </label>
                                    <div class="">
                                        <input type="file" name="image" class="form-control" id="imgInp" >
                                    </div>

                                    <input type="hidden" name="old_image" value="{{@$promo->image}}"
                                        class="form-control" id="image" placeholder="showphotos">
                                    @error('image')
                                    <span style="color:red" role="alert"><strong>{{ $message }}</strong> </span>
                                    @enderror
                                    @error('imgInp')
                                    <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <img id="blah" style="border: 3px solid #adb5bd !important;
                                    border-radius: 13px !important;" @if(@$promo->image)
                                    src="{{ asset('public/images/notification/')}}/{{@$promo->image}}"
                                    @else
                                    src="{{ asset('public/images/employee/no_image.jpg')}}"
                                    @endif alt="your offer image"
                                    width="180px" height="150px" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Message <span class="validation">*</span></label>
                                    <textarea class="form-control" name="message" id="message" rows="4"
                                        placeholder="Message">{{@$promo->message}}</textarea>
                                    @error('message')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            @if(@$promo)
                            <button type="submit" class="btn btn-info">Update</button>
                            @else
                            <button type="submit" class="btn btn-info">Submit</button>
                            @endif
                            <a href="{{route('notification')}}"><button type="button"
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
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    @endif

</script>


<script type="text/javascript">
    function changeFunc() {
        var type = document.getElementById("type");
        var selectedValue = type.options[type.selectedIndex].value;
        if (selectedValue == "category") {
            $('#category_id').show();
        } else {
            $('#category_id').hide();
        }
    }

</script>

@endsection
