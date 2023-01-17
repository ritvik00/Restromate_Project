@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Location update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('location')}}">Location list</a></li>
                    <li class="breadcrumb-item active">Loaction update</li>
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
                    <form method="POST" action="{{ route('location.update') }}">
                    @csrf

                    <input type="hidden" name="id" value="{{@$location->id}}"/>
                        <div class="card-body">

                        <div class="form-group">
                                <label for="loactionname">LocationName </label>
                                <input type="text" name="location_name" class="form-control" id="loactionname" 
                                    placeholder="Location Name" value="{{@$location->location_name}}">
                                    @error('location_name')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="isactive">IsActive</label>
                                    <select class="form-control" name="is_active">
                    
                                  <option disabled="disabled" selected="selected" >Choose Option</option>
                                
                                  <option value="1" @if(@$location->is_active == '1') selected @endif >active</option>
                                  <option value="0" @if(@$location->is_active == '0') selected @endif >inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="companyid">Company</label>
                                <select class="form-control" name="companyid" class="form-control" id="companyid">
                                    <option disabled="disabled" selected="selected">Choose Option</option>
                                    @forelse(@$company as $c)
                                    <option value='{{@$c->id}}' @if(@$c->id == $location->companyid) selected @endif>{{$c->user_name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('companyid')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@endsection