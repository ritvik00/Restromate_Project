@extends('layouts.app')
@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<div class="container-fluid">
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="col-2">
                        <a href="{{route('location.create')}}">
                            <button type="button" class="btn btn-block btn-primary">Create Location</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                           
                            <th>LocationName</th>
                            <th>IsActive</th>
                             <th>Company</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($location as $value)
                            <tr >
                                <td>{{$value->location_name}}</td>
                                <!-- <td>{{$value->is_active}}</td> -->
                                <td>
                                    @if($value->is_active == "1")
                                    <a class="btn btn-info">Active</a>
                                    @else
                                    <a class="btn btn-info">In-Active</a>
                                    @endif
                                </td>
                                <td>{{$value->CompanyId}}</td>
                                <td>
                             
                                <a class="btn btn-success" href="{{route('location.edit',['id'=>$value->id])}}"> Edit</a> 
                                <a class="btn btn-danger" href="{{route('location.delete',['id'=>$value->id])}}" onclick="return confirm('Are you sure you want to delete this location?')"> Delete</a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>





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