@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cms @if (@$edit)
                    Update
                    @else
                    Create
                    @endif
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('cms') }}">Cms list</a></li>
                    @if (@$edit)
                    <li class="breadcrumb-item active">Cms Update</li>
                    @else
                    <li class="breadcrumb-item active">Cms Create</li>
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
                    <form id="quickForm" action="{{ route('cms.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <input type="text" name="id" value="{{ @$edit->id }}" hidden="">

                            <div class="row">
                                <div class="form-group col-md-9">
                                    <!-- text input -->

                                    <label for="exampleInputEmail1">Title <span class="validation">*</span></label>
                                    <input type="text" id="exampleInputEmail1" class="form-control" name="title"
                                        placeholder="Title" value="{{ @$edit->title }}">
                                    @error('title')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>



                            <div class="row">
                                <div class="form-group col-sm-9">
                                    <!-- text input -->

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Content <span
                                                class="validation">*</span></label>
                                        <textarea id="summernote" name="content" placeholder="Content">
                                        @if (!empty(@$edit->content))
                                        {{ @$edit->content }}
                                        @endif
                                        </textarea>

                                        @error('content')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Title </label>
                                        <input type="text" id="meta_title" class="form-control" name="meta_title"
                                            placeholder="Meta Title" maxlength="60" value="{{ @$edit->meta_title }}">
                                        @error('meta_title')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        {{-- 
                                    <textarea class="form-control" name="meta_dec" maxlength="160"
                                    placeholder="Meta Description">{{@$edit->meta_dec}} </textarea> --}}

                                        <textarea class="form-control" name="meta_dec" id="meta_dec"
                                            placeholder="Meta Description">{{ @$edit->meta_dec }}</textarea>
                                        @error('meta_dec')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta keyword </label>
                                        <textarea class="form-control" name="meta_key" id="meta_key"
                                            placeholder="Meta keyword">{{ @$edit->meta_key }}</textarea>
                                        @error('meta_key')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- ./row -->
                        <div class="card-footer">
                            @if (@$edit)
                            <button type="submit" class="btn btn-info">Update</button>
                            @else
                            <button type="submit" class="btn btn-info">Submit</button>
                            @endif
                            <a href="{{ route('cms') }}"><button type="button" class="btn btn-success">Back</button></a>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>


    </div>

</section>




<!-- /.content -->




<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

</script>
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })

</script>
@endsection
