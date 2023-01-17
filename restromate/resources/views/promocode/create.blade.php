@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Promocode @if(@$promo) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('promocode')}}">Promocode List</a></li>
                    @if(@$promo)
                    <li class="breadcrumb-item active">Promocode Update</li>
                    @else
                    <li class="breadcrumb-item active">Promocode Create</li>
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
                    <form method="POST" action="{{ route('promocode.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="editgroup" name="id" value="{{@$promo->id}}" hidden="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="PromoCode">PromoCode <span class="validation">*</span></label>
                                        <input type="text" name="promocode" class="form-control" id="promocode"
                                            placeholder="PromoCode" value="{{@$promo->promocode}}">
                                        @error('promocode')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="StartDate">Start Date <span class="validation">*</span></label>
                                        <?php if(!empty($promo->start_date))
                                                {
                                                    $orgDate = $promo->start_date;
                                                    $newDate = date("Y-m-d", strtotime($orgDate));
                                                }

                                                ?>
                                        <input type="date" name="start_date" class="form-control" id="start_date"
                                            placeholder="StartDate" value="{{@$newDate}}">


                                        @error('start_date')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="StartDate">End Date <span class="validation">*</span></label>

                                        <?php if(!empty($promo->end_date))
                                        {
                                            $orgDate = $promo->end_date;
                                            $newDate = date("Y-m-d", strtotime($orgDate));
                                        }

                                        ?>

                                        <input type="date" name="end_date" class="form-control" id="end_date"
                                            placeholder="EndDate" value="{{@$newDate}}">
                                        @error('end_date')
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
                                        <label for="StartDate">Discount <span class="validation">*</span></label>
                                        <input type="number" name="discount" class="form-control" id="discount" min="0"
                                            placeholder="Discount" value="{{@$promo->discount}}">
                                        @error('discount')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="StartDate">Discount Type <span class="validation">*</span></label>
                                        <select class="form-control" id="discount_type" name="discount_type">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            <option value="amount" @if(@$promo->discount_type == 'amount') selected
                                                @endif >Amount</option>
                                            <option value="free" @if(@$promo->discount_type == 'free') selected @endif
                                                >Free</option>
                                        </select>
                                        @error('discount_type')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="StartDate">Repeat Use <span class="validation">*</span></label>
                                        <select class="form-control" id="repeat_use" name="repeat_use">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            <option value="1" @if(@$promo->repeat_use == '1') selected @endif >Yes
                                            </option>
                                            <option value="0" @if(@$promo->repeat_use == '0') selected @endif >No
                                            </option>
                                        </select>
                                        @error('discount_type')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Message">Message</label>
                                        <input type="text" name="message" class="form-control" id="message"
                                            placeholder="Message" value="{{@$promo->message}}">

                                        @error('message')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">


                                        <label for="exampleInputFile">Image <span class="validation">*</span></label>
                                        <div class="form-group">
                                            <div class="">
                                                <input type="file" name="image" class="form-control" id="imgInp" >
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
                                    </div>
                                    <div class="col-md-2">
                                        <div class="image_sec" style="margin:10px 0px;">
                                            <img id="blah" style="border: 3px solid #adb5bd !important;
                                        border-radius: 13px !important;" @if(@$promo->image)
                                            src="{{ asset('public/images/promocode/')}}/{{@$promo->image}}"
                                            @else
                                            src="{{ asset('public/images/employee/no_image.jpg')}}"
                                            @endif alt="Your Promocode Image"
                                            width="150px" height="100px" />
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
                                <a href="{{route('promocode')}}"><button type="button"
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
@endsection
