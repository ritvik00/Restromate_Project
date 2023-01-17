@extends('layouts.app')
@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Role</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Role List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="col-2">
                        <!-- <a href="{{route('compnay.create')}}">
                            <button type="button" class="btn btn-block btn-primary">Create Company</button>
                        </a> -->
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{--  <th>#</th>  --}}
                                <th>Role</th>
                                <th>Status</th>
                                <th>Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(@$role as $value)
                            <tr>
                                {{--  <td>{{$value->id}}</td>  --}}
                                <td>{{$value->role_name}}</td>
                                <td>
                                @if($value->is_active == "1")
                                <a class="btn btn-info" href="{{route('compnay.active',['id'=>$value->id , 'active'=>'inactive'])}}">Active</a>
                                @else
                                <a class="btn btn-info" href="{{route('compnay.active',['id'=>$value->id ,'active'=>'active'])}}">In-Active</a>
                                @endif
                                </td>
                                <td>

                                @if(@$value->id == '1')

                                @else
                                @endif

                                    <a class="btn btn-success" href="{{route('permission',['id'=>$value->id])}}">Permission</a>
                                    <!-- <a class="btn btn-danger" href="{{route('compnay.delete',['id'=>$value->id])}}" onclick="return confirm('Are you sure you want to delete this company?')"> Delete</a>  -->
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>





<!-- Page specific script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>


@endsection
