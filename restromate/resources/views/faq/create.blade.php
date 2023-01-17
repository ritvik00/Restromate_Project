@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Faq @if(@$faq) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('faq')}}">Faq List</a></li>
                    @if(@$faq)
                    <li class="breadcrumb-item active">Faq Update</li>
                    @else
                    <li class="breadcrumb-item active">Faq Create</li>
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
                    <form method="POST" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <input type="editgroup" name="id" value="{{@$faq->id}}" hidden="">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="loactionname">Question <span class="validation">*</span></label>
                            <input type="text" name="question" class="form-control" id="question"
                                placeholder="Question" value="{{@$faq->question}}">
                            @error('question')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="loactionname">Answer <span class="validation">*</span></label><br>
                            <textarea class="form-control" name="answer"
                                            placeholder="Answer">{{@$faq->answer}}</textarea>
                                        @error('answer')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>

                    </div>

                    
                        

                       
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @if(@$faq)
                        <button type="submit" class="btn btn-info">Update</button>
                        @else
                        <button type="submit" class="btn btn-info">Submit</button>
                        @endif
                        <a href="{{route('faq')}}"><button type="button" class="btn btn-success">Back</button></a>
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
