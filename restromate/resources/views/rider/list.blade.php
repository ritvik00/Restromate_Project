@extends('layouts.app')
@section('content')
<?php
                $datapermisstion = [];
                $permisstion = permisstion(Auth::user()->id);
                if (!empty($permisstion)) {
                    $datapermisstion = $permisstion;
                }
                ?>

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="col-1">
                        @empty(@$datapermisstion->systemuseradd == 'on')
                        @else
                        <a href="{{route('rider.create')}}">
                            <button type="button" class="btn btn-block btn-primary">Create</button>
                        </a>
                        @endempty
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Image</th>
                                <th>Commission Method</th>
                                <th>Serviceble City</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            
                            @forelse(@$promo as $promo)
                            @if($promo->role_id == 4)
                            <tr>
                                <td>{{@$i}}</td>
                                <td>{{$promo->user_name}}</td>
                                <td>{{$promo->email}}</td>
                                    <td>{{$promo->address}}</td>
                                    <td>{{$promo->phoneno}}</td>
                                    <td><img id="preview" style="width:100px;height:70px" class="profile-user-img img-fluid"
                                        src="{{ asset('public/uploads/user/'.$promo->photo)}}"
                                        alt="User profile picture"></td>
                                    <td>@if($promo->commision_method == "1")
                                            <p>Percentage on Delivery Charges</p> 
                                            @elseif ($promo->commision_method == "2")
                                            <p>Fixed Commission per Order</p> 
                                            @endif
                                    </td>
                                    <td>@if($promo->serviceble_city == "surat")
                                        <p>Surat</p> 
                                        @elseif ($promo->serviceble_city == "ahmedabad")
                                        <p>Ahmedabad</p> 
                                        @endif
                                    </td>
                                    <td>@if($promo->is_active == "0")
                                        <p>InActive</p> 
                                        @else
                                        <p>Active</p> 
                                        @endif
                                    </td>
                                {{-- <td>

                                    @if($promo->verified == "active")
                                    <a class="btn btn-info" href="{{route('promocode.active',['id'=>$promo->id , 'active'=>'inactive'])}}">Active</a> 
                                    @else
                                    <a class="btn btn-info" href="{{route('promocode.active',['id'=>$promo->id ,'active'=>'active'])}}">In-Active</a> 
                                    @endif

                                </td> --}}

                                <td>
                                    @empty(@$datapermisstion->systemuseredit == 'on')
                                    @else
                                        <a class="btn btn-success" href="{{route('rider.edit',['id'=>$promo->id])}}">
                                        Edit</a>
                                        @endempty

                                        @empty(@$datapermisstion->systemuserdelete == 'on')
                                    @else
                                        <a class="btn btn-danger" href="{{route('rider.delete',['id'=>$promo->id])}}"
                                        onclick="return confirm('Are you sure you want to delete this Systemuser?')">
                                        Delete</a>
                                        @endempty
                                </td>
                                <?php $i++;?>
                            </tr>
                            @endif
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
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    
});
</script>


@endsection