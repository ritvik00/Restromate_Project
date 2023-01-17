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
                        <a href="{{route('department.create')}}">
                            <button type="button" class="btn btn-block btn-primary">Create Department</button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Department ID</th>
                            <th>Department Name</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse(@$department as $d)

                        <tr>
                        <td>{{$d->id}}</td>
                                <td>{{$d->department_name}}</td>
                                <td>{{$d->companyid}}</td>
                                <td>
                                @if($d->is_active == "1")
                                <a class="btn btn-info">Active</a> 
                                @else
                                <a class="btn btn-info">In-Active</a> 
                                @endif
                                </td>
                                <td>
                        
                                    <a class="btn btn-success" href="{{route('department.edit',['id'=>$d->id])}}"> Edit</a> 
                                    <a class="btn btn-danger" href="{{route('department.delete',['id'=>$d->id])}}" onclick="return confirm('Are you sure you want to delete this Depatmant?')"> Delete</a> 
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

</script>