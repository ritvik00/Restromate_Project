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
<link rel="stylesheet"
    href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="col-1">
                        @empty(@$datapermisstion->promocodeadd == 'on')
                        @else
                        <a href="{{route('promocode.create')}}">
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
                                <th>Promo Code</th>
                                <th>Image</th>
                                <th>Message</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Discount</th>
                                <th>Discount Type</th>
                                <th>Repeat Use</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @forelse(@$promo as $promo)
                            <tr>
                                <td>{{@$i}}</td>
                                <td>{{$promo->promocode}}</td>
                                <td><img id="preview" style="width:100px;height:70px" class="profile-user-img img-fluid"
                                        src="{{asset('public/images/promocode/')}}/{{@$promo->image}}"
                                        alt="User profile picture"></td>
                                <td>{{$promo->message}}</td>
                                <td>{{date("d-m-Y",strtotime($promo->start_date))}}</td>
                                <td>{{date("d-m-Y",strtotime($promo->end_date))}}</td>
                                <td>{{$promo->discount}}</td>
                                <td>{{$promo->discount_type}}</td>
                                <td>@if($promo->repeat_use == "0")
                                    <p>No</p>
                                    @else
                                    <p>Yes</p>
                                    @endif
                                </td>
                                <td>

                                    @if($promo->verified == "active")
                                    <a class="btn btn-info"
                                        href="{{route('promocode.active',['id'=>$promo->id , 'active'=>'inactive'])}}">Active</a>
                                    @else
                                    <a class="btn btn-info"
                                        href="{{route('promocode.active',['id'=>$promo->id ,'active'=>'active'])}}">In-Active</a>
                                    @endif

                                </td>

                                {{-- <td>
                                    @empty(@$datapermisstion->promocodeedit == 'on')
                                    @else
                                    <a class="btn btn-success" href="{{route('promocode.edit',['id'=>$promo->id])}}">
                                        Edit</a>
                                    @endempty

                                    @empty(@$datapermisstion->promocodedelete == 'on')
                                    @else
                                    <a class="btn btn-danger" href="{{route('promocode.delete',['id'=>$promo->id])}}"
                                        onclick="return confirm('Are you sure you want to delete this Promocode?')">
                                        Delete</a>
                                    @endempty
                                </td> --}}


                                <td class="action">
                                    @empty(@$datapermisstion->promocodeedit == 'on')
                                    @else
    
                                    <a style="margin-right:5px;"  class="btn btn-success" href="{{route('promocode.edit',['id'=>$promo->id])}}">
                                        Edit</a>
                                        @endempty
    
    
                                        @empty(@$datapermisstion->promocodedelete == 'on')
                                        @else
    
                                        <form method="GET" action="{{route('promocode.delete',['id'=>$promo->id])}}">
                                            @csrf
                                            <input name ="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                        @endempty
                                </td>




                                <?php $i++;?>
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
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>



@endsection
