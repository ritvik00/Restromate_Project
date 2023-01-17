@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employee Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('employee')}}">Employee list</a></li>
                    <li class="breadcrumb-item active">Employee update</li>
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
                    <form method="POST" action="{{ route('employee.update') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="form-control" id="id" value="{{@$employee->id}}">

                        <div class="card-body">



                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="FirstName">FirstName</label>
                                        <input type="text" name="first_name" class="form-control" id="firstname"
                                            placeholder="FirstName" value="{{@$employee->first_name}}">
                                        @error('first_name')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="LastName">LastName</label>
                                        <input type="text" name="last_name" class="form-control" id="lastname"
                                            placeholder="LastName" value="{{@$employee->last_name}}">

                                        @error('last_name')
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
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email" value="{{@$employee->email}}" readonly>
                                        @error('email')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- <div class="col">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address"
                                            placeholder="Address">{{@$employee->address}}</textarea>
                                        @error('address')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="col-6">
                                        <label for="address">Home</label>
                                        <textarea class="form-control" name="home"
                                            placeholder="Home">{{@$employee->home}}</textarea>
                                        @error('home')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="PhoneNo">PhoneNo</label>
                                        <input type="number" name="phone_no" class="form-control" id="phoneno"
                                            placeholder="PhoneNo" value="{{@$employee->phone_no}}">
                                        @error('phone_no')
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
                                        <label for="DateOfBirth">DateOfBirth</label>

                                      <?php if(!empty($employee->date_of_brith))
                                                {
                                                    $orgDate = $employee->date_of_brith;
                                                    $newDate = date("Y-m-d", strtotime($orgDate));
                                                }  

                                                ?>
                                                    

                                        <input type="date" name="date_of_brith" class="form-control" id="DateOfBirth"
                                            value="{{@$newDate}}">
                                        @error('date_of_brith')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>

                                    <div class="col">
                                        <label for="DepartmentId">Department</label>

                                        <select class="form-control" id="department_id" name="department_id">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$dep as $de)
                                            <option value='{{@$de->id}}' @if(@$de->id == $employee->department_id)
                                                selected @endif >{{@$de->department_name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('department_id')
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
                                        <label for="homeno">HomeNo</label>
                                        <input type="tel" name="home_no" class="form-control" id="homeno"
                                            placeholder="HomeNo" value="{{@$employee->home_no}}">
                                    </div>
                                    <div class="col">
                                        <label for="work_phone">WorkNo</label>
                                        <input type="tel" name="work_phone" class="form-control" id="work_phone"
                                            value="{{@$employee->work_phone}}" placeholder="work_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="IsActive">IsActive</label>
                                        <select class="form-control" name="is_active">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            <option value="1" @if(@$employee->is_active == '1') selected @endif >active
                                            </option>
                                            <option value="0" @if(@$employee->is_active == '0') selected @endif>inactive
                                            </option>
                                        </select>
                                    </div>


                                    <div class="col-6">
                                        <label for="salary">Hourly Rate</label>
                                        <input type="number" name="hourly_rate" class="form-control" id="hourly_rate"
                                            placeholder="Hourly Rate" value="{{@$employee->hourly_rate}}">
                                        @error('hourly_rate')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="salary">Salary</label>
                                        <input type="number" name="salary" class="form-control" id="salary"
                                            placeholder="Salary" value="{{@$employee->salary}}">

                                        @error('salary')
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

                                    <?php if(!empty($employee->start_date))
                                                {
                                                    $orgDate = $employee->date_of_brith;
                                                    $newDate = date("Y-m-d", strtotime($orgDate));
                                                }  

                                                ?>
                                        <label for="start_date">StartDate</label>
                                        <input type="date" name="start_date" class="form-control" id="WorkNo"
                                            value="{{@$newDate}}">

                                        @error('start_date')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="last_date_of_work">LastDay</label>
                                        <input type="number" name="last_day_of_work" class="form-control"
                                            id="last_day_of_work" placeholder="LastDay"
                                            value="{{@$employee->last_day_of_work}}">

                                        @error('last_day_of_work')
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
                                        <label for="companyid">Company</label>

                                        <select name="companyid" class="form-control" id="companyid">
                                            <option disabled="disabled" selected="selected">Choose Option</option>
                                            @forelse(@$compnay as $com)
                                            <option value='{{@$com->id}}' @if(@$com->id == $employee->companyid)
                                                selected @endif >{{@$com->user_name}}</option>
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
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">

                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input" id="imgInp">
                                                <label class="custom-file-label" for="imgInp">Choose file</label>
                                            </div>
                                            <input type="hidden" name="showphotos" class="form-control"
                                            id="showphotos" placeholder="showphotos"
                                            value="{{@$employee->photo}}">
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <img id="blah" @if(@$employee->photo)
                                        src="{{ asset('images/employee')}}/{{@$employee->photo}}"
                                        @else
                                        src="{{ asset('images/employee/no_image.jpg')}}"
                                        @endif alt="your employee image"
                                        width="250px" height="250px" />
                                    </div>
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

<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>



@endsection