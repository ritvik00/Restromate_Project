@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Slider @if(@$slider) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('slider')}}">Slider List</a></li>
                    @if(@$slider)
                    <li class="breadcrumb-item active">Slider Update</li>
                    @else
                    <li class="breadcrumb-item active">Slider Create</li>
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
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <input type="editgroup" name="id" value="{{@$slider->id}}" hidden="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="name">Type Of Product <span class="validation">*</span></label>
                                        <select class="form-control" id="type" name="type" onchange="changeFunc();">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            <option value="default" @if(@$slider->type == 'default') selected
                                                @endif >Default
                                            </option>
                                            <option id="category" value="category" @if(@$slider->type == 'category') selected @endif >Category
                                            </option>
                                            <option id="product" value="product" @if(@$slider->type == 'product') selected @endif >Product
                                            </option>
                                            
                                        </select>
                                        @error('type')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col" id="addionalprice" @if(@$slider->type == 'category') style="display: block;" @else style="display: none;" @endif >
                                        <label for="StartDate">Category <span class="validation">*</span></label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$cat as $ctg)
                                            <option value='{{@$ctg->id}}' @if(@$ctg->id == @$slider->category_id)
                                                selected @endif>{{@$ctg->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('category_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col" id="products" @if(@$slider->type == 'product') style="display: block;" @else style="display: none;" @endif >
                                        <label for="StartDate">Product <span class="validation">*</span></label>
                                        <select class="form-control" id="product_id" name="product_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$pct as $products)
                                            <option value='{{@$products->id}}' @if(@$products->id == @$slider->product_id)
                                                selected @endif>{{@$products->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('product_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>



                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">

                                        <label for="exampleInputFile">Image <span class="validation">*</span></label>
                                        <div class="form-group">
                                            <div class="">
                                                <input type="file" name="image" class="form-control" id="imgInp" >
                                            </div>
                                            <input type="hidden" name="oldimage" class="form-control" id="image"
                                                placeholder="showphotos" value="{{@$slider->image}}">
                                            @error('image')
                                            <span style="color:red" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            @error('imgInp')
                                            <span style="color:red" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            <!-- <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div> -->
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <img id="blah" style="border: 3px solid #adb5bd !important;
                                    border-radius: 13px !important;" @if(@$slider->image)
                                        src="{{ asset('public/images/slider/')}}/{{@$slider->image}}"
                                        @else
                                        src="{{ asset('public/images/employee/no_image.jpg')}}"
                                        @endif alt="Your Slider Image"
                                        width="200px" height="150px" />
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            @if(@$slider)
                            <button type="submit" class="btn btn-info">Update</button>
                            @else
                            <button type="submit" class="btn btn-info">Submit</button>
                            @endif
                            <a href="{{route('slider')}}"><button type="button"
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
<script type="text/javascript">
    function changeFunc() {
        var type = document.getElementById("type");
        var selectedValue = type.options[type.selectedIndex].value;
        if (selectedValue == "category") {
            // alert("category");
            $('#addionalprice').show();
        } else {
            $('#addionalprice').hide();
        }
        if (selectedValue == "product") {
            // alert("product");
            $('#products').show();
        } else {
            $('#products').hide();
        }
    }

</script>



@endsection
