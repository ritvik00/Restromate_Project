@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Addons @if(@$offer) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('faq')}}">Addons List</a></li>
                    @if(@$offer)
                    <li class="breadcrumb-item active">Addons Update</li>
                    @else
                    <li class="breadcrumb-item active">Addons Create</li>
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
                    <form method="POST" action="{{ route('addons.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <input type="editgroup" name="id"  hidden="" value="{{@$offer->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Title <span class="validation">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" value="{{@$offer->title}}"
                                placeholder="Title">
                            @error('title')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Short-Description <span class="validation">*</span></label>
                            <input type="text" name="description" class="form-control" id="description" value="{{@$offer->description}}"
                                placeholder="Short-Description">
                            @error('description')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Calorie [cal]<span class="validation">*</span></label>
                            <input type="number" name="calories" class="form-control" id="calories" value="{{@$offer->calories}}" min="0"
                                placeholder="Calorie [cal] Ex:-100,200">
                            @error('calories')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Price <span class="validation">*</span></label>
                            <input type="number" name="price" class="form-control" id="price" value="{{@$offer->price}}" min="0"
                                placeholder="Price">
                            @error('price')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="loactionname">Image <span class="validation">*</span></label>
                            <div class="">
                                <input type="file" name="image" class="form-control" id="imgInp" >
                                {{-- <label class="custom-file-label" for="imgInp">Image</label> --}}
                            </div>
                            <input type="hidden" name="old_image" class="form-control"
                                id="image" placeholder="showphotos" value="{{@$offer->image}}">
                                @error('image')
                                    <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                                @error('imgInp')
                                    <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <img id="blah" style="border: 3px solid #adb5bd !important;
                                    border-radius: 13px !important;" @if(@$offer->image)
                                    src="{{ asset('public/images/product/')}}/{{@$offer->image}}"
                                    @else
                                    src="{{ asset('public/images/employee/no_image.jpg')}}"
                                    @endif alt="your offer image"
                                    width="180px" height="150px" />
                        </div>

                        
                    </div>

                    
                        

                       
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @if(@$offer)
                        <button type="submit" class="btn btn-info">Update</button>
                        @else
                        <button type="submit" class="btn btn-info">Submit</button>
                        @endif
                        <a href="{{route('addons')}}"><button type="button" class="btn btn-success">Back</button></a>
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
    @if(Session::has('success'))
    toastr.options = 
    {
        "closeButton":true,
        "progressBar":true
    }
    @endif
</script>

@endsection
