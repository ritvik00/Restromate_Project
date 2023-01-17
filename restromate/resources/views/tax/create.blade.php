@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tax @if(@$offer) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('faq')}}">Tax List</a></li>
                    @if(@$offer)
                    <li class="breadcrumb-item active">Tax Update</li>
                    @else
                    <li class="breadcrumb-item active">Tax Create</li>
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
            <div class="col-md-3">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('tax.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <input type="editgroup" name="id"  hidden="" value="{{@$offer->id}}">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label for="loactionname">Name <span class="validation">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{@$offer->name}}"
                                placeholder="Name">
                            @error('name')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-10">
                            <label for="loactionname">Percentage <span class="validation">*</span></label>
                            <input type="text" name="percentage" class="form-control" id="percentage" value="{{@$offer->percentage}}"
                                placeholder="Percentage">
                            @error('percentage')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                        <a href="{{route('tax')}}"><button type="button" class="btn btn-success">Back</button></a>
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
