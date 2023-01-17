@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product @if(@$promo) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('product')}}">Product List</a></li>
                    @if(@$promo)
                    <li class="breadcrumb-item active">Product Update</li>
                    @else
                    <li class="breadcrumb-item active">Product Create</li>
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
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="editgroup" name="id" value="{{@$promo->id}}" hidden="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="name">Name <span class="validation">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                            value="{{@$promo->name}}">
                                        @error('name')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="name">Description <span class="validation">*</span></label>
                                        <input type="text" name="description" class="form-control" id="description"
                                            placeholder="Description" value="{{@$promo->description}}">
                                        @error('description')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="name">Calorie [cal] <span class="validation">*</span></label>
                                        <input type="number" name="calories" class="form-control" id="calories" min="0"
                                            placeholder="Calorie [cal] Ex:-100,200" value="{{@$promo->calories}}">
                                        @error('calories')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="StartDate">Price <span class="validation">*</span></label>
                                            <input type="number" name="price" class="form-control"
                                            id="price" min="0" placeholder="Minimum Order Quantity"
                                            value="{{@$promo->price}}">
                                        @error('price')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="StartDate">Category <span class="validation">*</span></label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$cat as $ctg)
                                            <option value='{{@$ctg->id}}' @if(@$ctg->id == @$promo->category_id)
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
                                    <div class="col">
                                        <label for="StartDate">Tax <span class="validation">*</span></label>
                                        <select class="form-control" id="tax_id" name="tax_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$tax as $tx)
                                            <option value='{{@$tx->id}}' @if(@$tx->id == @$promo->tax_id)
                                                selected @endif>{{@$tx->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('tax_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="StartDate">Attributes <span class="validation">*</span></label>
                                        <select class="form-control" id="attributes_id" name="attributes_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$att as $at)
                                            <option value='{{@$at->id}}' @if(@$at->id == @$promo->attributes_id)
                                                selected @endif>{{@$at->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('attributes_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="name">Partner <span class="validation">*</span></label>
                                        <select class="form-control" id="partner" name="partner">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$pat as $at)
                                            <option value='{{@$at->id}}' @if(@$at->id == @$promo->partner)
                                                selected @endif>{{@$at->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('partner')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="name">Highlight <span class="validation">*</span></label>
                                        <input type="text" name="highlight" class="form-control" id="highlight"
                                            placeholder="Highlight" value="{{@$promo->highlight}}">
                                        @error('highlight')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="name">Allowed Order Quantity <span
                                                class="validation">*</span></label>
                                        <input type="number" name="allowedorderquantity" class="form-control"
                                            id="allowedorderquantity" min="0" placeholder="Allowed Order Quantity"
                                            value="{{@$promo->allowedorderquantity}}">
                                        @error('allowedorderquantity')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="name">Minimum Order Quantity <span
                                                class="validation">*</span></label>
                                        <input type="number" name="minimumorderquantity" class="form-control"
                                            id="minimumorderquantity" min="0" placeholder="Minimum Order Quantity"
                                            value="{{@$promo->minimumorderquantity}}">
                                        @error('minimumorderquantity')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="StartDate">Addons <span class="validation">*</span></label>
                                        <select class="form-control" id="addons_id" name="addons_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$add as $ad)
                                            <option value='{{@$ad->id}}' @if(@$ad->id == @$promo->addons_id)
                                                selected @endif>{{@$ad->title}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('addons_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="name">Indicator <span class="validation">*</span></label>
                                        <select class="form-control" id="indicator" name="indicator">
                                            <option disabled="disabled" selected="selected">Choose Option
                                            </option>
                                            <option value="veg" @if(@$promo->indicator == 'veg') selected @endif>Veg
                                            </option>
                                            <option value="nonveg" @if(@$promo->indicator == 'nonveg') selected
                                                @endif>Non-Veg</option>
                                            <option value="both" @if(@$promo->indicator == 'both') selected @endif>Both
                                            </option>
                                        </select>
                                        @error('indicator')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">

                                        <label for="StartDate">Image <span class="validation">*</span></label>
                                        <div class="">
                                            <input type="file" name="image" class="form-control" id="imgInp">
                                        </div>

                                        <input type="hidden" name="oldimage" class="form-control" id="image"
                                            placeholder="showphotos" value="{{@$promo->image}}">
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
                                    <div class="col-md-2">
                                        <div class="image_sec" style="margin:10px 0px;">
                                            <img id="blah" style="border: 3px solid #adb5bd !important;
                                        border-radius: 13px !important;" @if(@$promo->image)
                                            src="{{ asset('public/images/product/')}}/{{@$promo->image}}"
                                            @else
                                            src="{{ asset('public/images/employee/no_image.jpg')}}"
                                            @endif alt="Your Product Image"
                                            width="150px" height="100px" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="StartDate">Tag <span class="validation">*</span></label>
                                        <select class="select2" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;" id="tag_id" name="tag_id[]">

                                            @php $selected = explode(",", @$promo->tag_id); @endphp

                                            @forelse(@$tag as $tags)
                                            <option value='{{@$tags->id}}' @if(in_array(@$tags->id, $selected)) selected
                                                @endif>{{@$tags->name}}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                        @error('tag_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-9">
                                        <h4>Additional Info</h4>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="name">Type Of Product <span class="validation">*</span></label>
                                                <select class="form-control" id="producttype" name="producttype" onchange="changeFunc();">
                                                    <option disabled="disabled" selected="selected">Choose Option</option>
                                                    <option id="simpleproduct" value="simpleproduct" @if(@$promo->producttype == 'simpleproduct') selected @endif >Simple Product
                                                    </option>
                                                    <option value="variableproduct" @if(@$promo->producttype == 'variableproduct') selected
                                                        @endif >Variable Product
                                                    </option>
                                                </select>
                                                @error('type')
                                                <span style="color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col" id="addionalprice" @if(@$promo->producttype == 'simpleproduct') style="display: block;" @else style="display: none;" @endif >
                                                <label for="name">Price </label>
                                                <input type="number" name="addionalprice" class="form-control"
                                                id="addionalprices" min="0" placeholder="Minimum Order Quantity"
                                                value="{{@$promo->addionalprice}}">
                                            </div>
                                            <div class="form-group col" id="addionalspecialprice" @if(@$promo->producttype == 'simpleproduct') style="display: block;" @else style="display: none;" @endif >
                                                <label for="name">Special Price </label>
                                                <input type="number" name="addionalspecialprice" class="form-control"
                                                id="addionalspecialprices" min="0" placeholder="Minimum Order Quantity"
                                                value="{{@$promo->addionalprice}}">
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
                            <a href="{{route('product')}}"><button type="button"
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
        var type = document.getElementById("producttype");
        var selectedValue = type.options[type.selectedIndex].value;
        if (selectedValue == "simpleproduct") {
            $('#addionalprice').show();
            $('#addionalspecialprice').show();
        } else {
            $('#addionalprice').hide();
            $('#addionalspecialprice').hide();
        }
    }

</script>
@endsection
