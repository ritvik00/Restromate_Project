@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ticket @if(@$tickets) Update @else Create @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('ticket')}}">Ticket List</a></li>
                    @if(@$tickets)
                    <li class="breadcrumb-item active">Ticket Update</li>
                    @else
                    <li class="breadcrumb-item active">Ticket Create</li>
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

                    <form method="POST" action="{{route('ticket.ticketstore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <input type="editgroup" name="id" value="{{@$tickets->id}}" hidden="">
                                {{-- <div class="col">
                                   
                                    <div class="form-group">
                                        <label for="loactionname">Ticket Name <span class="validation">*</span></label>
                                        <input type="text" name="ticket_name" class="form-control" id="ticket_name"
                                            placeholder="Ticket Name" value="{{@$tickets->ticket_name}}">
                                        @error('ticket_name')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col">
                                    <label for="StartDate">Ticket Type<span class="validation">*</span></label>
                                    <select class="form-control" id="ticket_name" name="ticket_name">
                                        <option disabled="disabled" selected="selected">Choose Option</option>
                                        @forelse(@$tic as $ctg)
                                        <option value='{{@$ctg->id}}' @if(@$ctg->id == @$tickets->ticket_name)
                                            selected @endif>{{@$ctg->ticket_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('ticket_name')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="loactionname">User Id<span class="validation">*</span></label>
                                        <input type="number" name="user_id" class="form-control" id="user_id" min="0"
                                            placeholder="User Id" value="{{@$tickets->user_id}}">
                                        @error('user_id')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="loactionname">Email<span class="validation">*</span></label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email" value="{{@$tickets->email}}">
                                        @error('subject')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="loactionname">Subject<span class="validation">*</span></label>
                                        <input type="text" name="subject" class="form-control" id="subject"
                                            placeholder="Subject" value="{{@$tickets->subject}}">
                                        @error('subject')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputEmail1">Description <span class="validation">*</span></label>
                                    <textarea class="form-control" name="description" id="description" rows="4"
                                        placeholder="Description">{{@$tickets->description}}</textarea>
                                        @error('description')
                                        <span style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            @if(@$tickets)
                            <button type="submit" class="btn btn-info">Update</button>
                            @else
                            <button type="submit" class="btn btn-info">Submit</button>
                            @endif
                            <a href="{{route('ticket')}}"><button type="button"
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
