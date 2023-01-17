@extends('layouts.app')
@section('content')
<?php
                $datapermisstion = [];
                $permisstion = permisstion(Auth::user()->id);
                if (!empty($permisstion)) {
                    $datapermisstion = $permisstion;
                }
                ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Firebase Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Firebase Setting</li>
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
                    <form method="POST" action="{{ route('firebase.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="editgroup" name="id" hidden="" value="{{@$firebase->id}}">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="loactionname">ApiKey <span class="validation">*</span></label>
                                    <input type="text" name="apikey" class="form-control" id="apikey"
                                        value="{{@$firebase->apikey}}" placeholder="ApiKey">
                                    @error('apikey')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Auth Domain <span class="validation">*</span></label>
                                    <input type="text" name="authdomain" class="form-control" id="authdomain"
                                        value="{{@$firebase->authdomain}}" placeholder="Auth Domain">
                                    @error('authdomain')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Database Url <span class="validation">*</span></label>
                                    <input type="text" name="databaseurl" class="form-control" id="databaseurl"
                                        value="{{@$firebase->databaseurl}}" placeholder="Database Url">
                                    @error('databaseurl')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="form-group col-md-4">
                                    <label for="loactionname">Project Id <span class="validation">*</span></label>
                                    <input type="text" name="projectid" class="form-control" id="projectid"
                                        value="{{@$firebase->projectid}}" placeholder="Project Id">
                                    @error('projectid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Storage Bucket <span class="validation">*</span></label>
                                    <input type="text" name="storagebucket" class="form-control" id="storagebucket"
                                        value="{{@$firebase->storagebucket}}" placeholder="Storage Bucket">
                                    @error('storagebucket')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Messaging Sender Id <span class="validation">*</span></label>
                                    <input type="text" name="messagingsenderid" class="form-control"
                                        id="messagingsenderid" value="{{@$firebase->messagingsenderid}}"
                                        placeholder="Messaging Sender Id">
                                    @error('messagingsenderid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="loactionname">App Id <span class="validation">*</span></label>
                                    <input type="text" name="appid" class="form-control" id="appid"
                                        value="{{@$firebase->appid}}" placeholder="App Id">
                                    @error('appid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="loactionname">Measurement Id <span class="validation">*</span></label>
                                    <input type="text" name="measurementid" class="form-control" id="measurementid"
                                        value="{{@$firebase->measurementid}}" placeholder="Auth Domain">
                                    @error('measurementid')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @empty(@$datapermisstion->firebaseedit == 'on')
                        @else
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        @endempty

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

@endsection
