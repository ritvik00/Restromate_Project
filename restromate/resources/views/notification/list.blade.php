@extends('layouts.app')
@section('content')
<?php
    $datapermisstion = [];
    $permisstion = permisstion(Auth::user()->id);
    if (!empty($permisstion)) {
        $datapermisstion = $permisstion;
    }
?>
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
                    <div class="col-1">
                        @empty(@$datapermisstion->notificationadd == 'on')
                        @else
                        <a href="{{route('notification.create')}}">
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
                                <th>Type</th>
                                <th>Image</th>
                                {{-- <th>Category</th> --}}
                                <th>Title</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @forelse(@$product as $offer)
                            <tr>
                                <td>{{@$i}}</td>
                                <td>{{$offer->type}}</td>
                                <td><img id="preview" style="width:100px;height:70px" class="profile-user-img img-fluid"
                                    src="{{asset('public/images/notification/')}}/{{@$offer->image}}"
                                    alt="User profile picture"></td>
                                {{-- <td>{{$offer->category_id}}</td> --}}
                                <td>{{$offer->title}}</td>
                                <td>{{$offer->message}}</td>
                                    
                              

                                {{-- <td>
                                    @empty(@$datapermisstion->notificationedit == 'on')
                                    @else
                                        <a class="btn btn-success" href="{{route('notification.edit',['id'=>$offer->id])}}">
                                        Edit</a>
                                        @endempty

                                        @empty(@$datapermisstion->notificationdelete == 'on')
                                        @else
                                        <a class="btn btn-danger" href="{{route('notification.delete',['id'=>$offer->id])}}"
                                        onclick="return confirm('Are you sure you want to delete this Notification?')">
                                        Delete</a>
                                        @endempty
                                </td> --}}


                                <td class="action">
                                    @empty(@$datapermisstion->notificationedit == 'on')
                                    @else
    
                                    <a style="margin-right:5px;"  class="btn btn-success" href="{{route('notification.edit',['id'=>$offer->id])}}">
                                        Edit</a>
                                        @endempty
    
    
                                        @empty(@$datapermisstion->notificationdelete == 'on')
                                        @else
    
                                        <form method="GET" action="{{route('notification.delete',['id'=>$offer->id])}}">
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
$(function() {
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