@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Featured @if(@$offer) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('featured')}}">Featured List</a></li>
                    @if(@$offer)
                    <li class="breadcrumb-item active">Featured Update</li>
                    @else
                    <li class="breadcrumb-item active">Featured Create</li>
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
                    <form method="POST" action="{{ route('featured.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <input type="editgroup" name="id"  hidden="" value="{{@$promo->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Title <span class="validation">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" value="{{@$promo->title}}"
                                placeholder="Title">
                            @error('title')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Short-Description <span class="validation">*</span></label>
                            <input type="text" name="description" class="form-control" id="description" value="{{@$promo->description}}"
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
                            <label for="exampleInputEmail1">Category <span class="validation">*</span></label>
                                            {{-- <select name="category" class="form-control" id="category">
                                                <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$cat as $ad)
                                            <option value='{{@$ad->id}}' @if(@$ad->id == @$promo->category)
                                                selected @endif>{{@$ad->name}}</option>
                                            @empty
                                            @endforelse
                                            </select>
                                            @error('category')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror --}}


                                            <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" id="category" name="category[]">
                                            
                                                @php $selected = explode(",", @$promo->category); @endphp
                                                
                                                @forelse(@$cat as $tags)
                                                <option value='{{@$tags->id}}'  @if(in_array(@$tags->id, $selected)) selected @endif>{{@$tags->name}}</option>
                                                @empty
                                                @endforelse
                            
                                              </select>
                                            @error('category')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="StartDate">Product Type <span class="validation">*</span></label>
                                        <select class="form-control" id="product_type" name="product_type">
                                            <option value="">- -Select Product Type- -</option>
                                            <option value="newaddedfoods" @if(@$promo->product_type == 'newaddedfoods') selected @endif>New Added Foods
                                            </option>
                                            <option value="foodonoffer" @if(@$promo->product_type == 'foodonoffer') selected @endif>Food On Offer
                                            </option>
                                            <option value="topratedfoods " @if(@$promo->product_type == 'topratedfoods') selected @endif>Top Rated Foods 
                                            </option>
                                            <option value="mostorderedfoods" @if(@$promo->product_type == 'mostorderedfoods') selected @endif>Most Ordered Foods
                                            </option>
                                        </select>
                                        @error('product_type')
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
                        <a href="{{route('featured')}}"><button type="button" class="btn btn-success">Back</button></a>
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
