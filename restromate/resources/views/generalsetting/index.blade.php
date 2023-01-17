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
                <h1>General Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">General Setting</li>
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
                    <form method="POST" action="{{ route('generalsetting.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <input type="editgroup" name="id"  hidden="" value="{{@$setting->id}}">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="loactionname">Site Title <span class="validation">*</span></label>
                            <input type="text" name="sitetitle" class="form-control" id="sitetitle" value="{{@$setting->sitetitle}}"
                                placeholder="Sitetitle">
                            @error('sitetitle')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="loactionname">Support Number <span class="validation">*</span></label>
                            <input type="number" name="number" class="form-control" id="number" min="0" value="{{@$setting->number}}"
                                placeholder="Support Number" >
                            @error('number')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="loactionname">Support Email <span class="validation">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" value="{{@$setting->email}}"
                                placeholder="Support Email">
                            @error('email')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Copyright Details <span class="validation">*</span></label>
                            <textarea  rows="3" cols="33" class="form-control" name="copyright" id="copyright" 
                                            placeholder="Copyright Details">{{@$setting->copyright}}</textarea>
                                            @error('copyright')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Address <span class="validation">*</span></label>
                            <textarea  rows="3" cols="33" class="form-control" name="address" id="address" 
                                            placeholder="Address">{{@$setting->address}}</textarea>
                                            @error('address')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Short Description <span class="validation">*</span></label>
                            <textarea  rows="3" cols="33" class="form-control" name="description" id="description" 
                                            placeholder="Short Description">{{@$setting->description}}</textarea>
                                            @error('description')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Map Iframe <span class="validation">*</span></label>
                            <textarea  rows="3" cols="33" class="form-control" name="mapiframe" id="mapiframe" 
                                            placeholder="Map iframe">{{@$setting->mapiframe}}</textarea>
                                            @error('mapiframe')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Meta Keywords <span class="validation">*</span></label>
                            <textarea  rows="3" cols="33" class="form-control" name="metakeywords" id="metakeywords" 
                                            placeholder="Meta Keywords">{{@$setting->metakeywords}}</textarea>
                                            @error('metakeywords')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Meta Description <span class="validation">*</span></label>
                            <textarea  rows="3" cols="33" class="form-control" name="metadescription" id="metadescription" 
                                            placeholder="Meta Description">{{@$setting->metadescription}}</textarea>
                                            @error('metadescription')
                                            <span style="color:red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>


                    </div>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="exampleInputFile">Choose Site Logo  <span class="validation">*</span></label>
                            <div class="custom-file">
                                <input type="file" name="siteimage" class="form-control" id="imgInp" >
                            </div>
                            <input type="hidden" name="old_siteimage" class="form-control"
                                id="old_siteimage" placeholder="showphotos" value="{{@$setting->siteimage}}">
                                @error('old_siteimage')
                                <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                                @error('imgInp')
                                <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <img id="blah" style="border: 3px solid #adb5bd !important;
                                    border-radius: 13px !important;" @if(@$setting->siteimage)
                                    src="{{ asset('public/images/site/')}}/{{@$setting->siteimage}}"
                                    @else
                                    src="{{ asset('images/employee/no_image.jpg')}}"
                                    @endif alt="your employee image"
                                    width="200px" height="150px" />
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputFile">Choose Favicon Image  <span class="validation">*</span></label>
                            <div class="custom-file">
                                <input type="file" name="faviconimage" class="form-control" id="imgInp1" >
                            </div>
                            <input type="hidden" name="old_faviconimage" class="form-control"
                                id="old_faviconimage" placeholder="showphotos" value="{{@$setting->faviconimage}}">
                                @error('old_faviconimage')
                                <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                                @error('imgInp1')
                                <span style="color:red" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <img id="blah1" style="border: 3px solid #adb5bd !important;
                                    border-radius: 13px !important;" @if(@$setting->faviconimage)
                                    src="{{ asset('public/images/site/')}}/{{@$setting->faviconimage}}"
                                    @else
                                    src="{{ asset('images/employee/no_image.jpg')}}"
                                    @endif alt="your employee image"
                                    width="200px" height="150px" />
                        </div>

                    </div>


                    <h4>Social Media Link</h4>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Facebook <span class="validation">*</span></label>
                            <input type="text" name="facebook" class="form-control" id="facebook" value="{{@$setting->facebook}}"
                                placeholder="Facebook">
                            @error('facebook')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Twitter <span class="validation">*</span></label>
                            <input type="text" name="twitter" class="form-control" id="twitter" min="0" value="{{@$setting->twitter}}"
                                placeholder="Twitter" >
                            @error('twitter')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loactionname">Instagram <span class="validation">*</span></label>
                            <input type="text" name="instagram" class="form-control" id="instagram" value="{{@$setting->instagram}}"
                                placeholder="Instagram">
                            @error('instagram')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="loactionname">Youtube <span class="validation">*</span></label>
                            <input type="text" name="youtube" class="form-control" id="youtube" min="0" value="{{@$setting->youtube}}"
                                placeholder="Youtube" >
                            @error('youtube')
                            <span style="color:red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    
                        

                       
                    </div>
                    <!-- /.card-body -->
                    @empty(@$datapermisstion->generalsettingedit == 'on')
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
