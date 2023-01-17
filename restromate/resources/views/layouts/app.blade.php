<!DOCTYPE html>
<html lang="en">

<head>
    @php
    $settings = setting();
    $footername = "";
    $siteimg = "";
    $favicon = "";
    $sitetitle = "";





    if(!empty($settings))
    {
    $footername = $settings->copyright;
    $siteimg = url('/').'/public/images/site/'.$settings->siteimage;
    $favicon = url('/').'/public/images/site/'.$settings->faviconimage;;
    $sitetitle = $settings->sitetitle;
    }else{
    $siteimg = url('/public/images/employee/no_image.jpg');
    $favicon = url('/public/images/employee/no_image.jpg');
    }
    @endphp


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restromate | Admin Panel</title>
    <!--================= site favicon icon =================-->
    <link rel="shortcut icon" type="image/png" href="{{ $favicon }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .validation {
            color: red;
        }

        .action {
            display: flex;
        }

    </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">



        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('assets/admin/dist/img/AdminLTELogo.png')}}"
        alt="AdminLTELogo"
        height="60" width="60">

    </div> --}}

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">


            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <img src="{{ asset('public/uploads/user/')}}/{{Auth::user()->photo}}" class="user-image"
                                    alt="User Image" />
                                <span class="hidden-xs"
                                    style="text-transform: capitalize;">{{ Auth::user()->user_name }}</span>
                            </a>
                            <ul class="dropdown-menu" style="left: inherit;right: 10px; width: 360px;">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('public/uploads/user/')}}/{{Auth::user()->photo}}" class=""
                                        alt="User Image">
                                    <p style="text-transform: capitalize;">
                                        {{ Auth::user()->user_name }}
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">

                                    <div class="container" style="display: block;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <a class="btn btn-block btn-outline-secondary"
                                                        href="{{ route('updateuseredit') }}"
                                                        class="btn btn-default btn-flat" style="border: 1px solid #fff;
                                                            color: #fff; ">Update Profile</a>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div>
                                                    <a class="btn btn-block btn-outline-warning "
                                                        href="{{ route('updatepassword') }}"
                                                        class="btn btn-default btn-flat" style="">Change
                                                        password</a>
                                                </div>
                                            </div>

                                            <div class="col-sm-12" style="margin-top:10px;">
                                                <div class="pull-right">

                                                    <a class="btn btn-block btn-outline-info " style=""
                                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                        <!-- Message Start -->
                                                        Logout
                                                        <!-- Message End -->
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
        </ul>
    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">

            {{-- <img src="{{ asset('public/images/site/')}}/{{$settings->siteimage}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 1; background-color:#fff"> --}}
            <img src="{{@$siteimg}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: 1; background-color:#fff" />

            <span class="brand-text font-weight-light">
                {{ $sitetitle }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('public/uploads/user/')}}/{{Auth::user()->photo}}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="text-transform: capitalize;">{{Auth::user()->user_name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                    <?php
                $datapermisstion = [];
                $permisstion = permisstion(Auth::user()->id);
                if (!empty($permisstion)) {
                    $datapermisstion = $permisstion;
                }
                ?>
                    <li class="nav-item menu-open">
                        <a href="{{route('home')}}" class="nav-link @if(Request::segment(1) == 'home') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>


                    @empty(@$datapermisstion->systemuserview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('systemuser')}}"
                            class="nav-link @if(Request::segment(1) == 'systemuser') active @endif">
                            <i class="nav-icon  fas fa-user-shield"></i>
                            <p>
                                System User
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->roleview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('role')}}" class="nav-link @if(Request::segment(1) == 'role') active @endif">
                            <i class="nav-icon 	fas fa-lock-open"></i>
                            <p>
                                Permission
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->categoryview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('category')}}"
                            class="nav-link @if(Request::segment(1) == 'category') active @endif">
                            <i class="nav-icon 	fas fa-stream"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->tagview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('tag')}}" class="nav-link @if(Request::segment(1) == 'tag') active @endif">
                            <i class="nav-icon 	fas fa-anchor"></i>
                            <p>
                                Tag
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->attributesview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('attributes')}}"
                            class="nav-link @if(Request::segment(1) == 'attributes') active @endif">
                            <i class="nav-icon 	fas fa-fax"></i>
                            <p>
                                Attributes
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->addonsview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('addons')}}"
                            class="nav-link @if(Request::segment(1) == 'addons') active @endif">
                            <i class="nav-icon fas fa-ad"></i>
                            <p>
                                Addons
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->featuredview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('featured')}}"
                            class="nav-link @if(Request::segment(1) == 'featured') active @endif">
                            <i class="nav-icon 	fas fa-dolly-flatbed"></i>
                            <p>
                                Featured
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->productview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('product')}}"
                            class="nav-link @if(Request::segment(1) == 'product') active @endif">
                            <i class="nav-icon  fas fa-layer-group"></i>
                            <p>
                                Product
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->sliderview == 'on')
                    @else

                    <li class="nav-item menu-open">
                        <a href="{{route('slider')}}"
                            class="nav-link @if(Request::segment(1) == 'slider') active @endif">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Slider
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->ticketview == 'on')
                    @else
                    <li class="nav-item"
                        style="background-color: #494E53 !important; border-radius: 6px; margin-bottom: 4px;">
                        <a href="#" class="nav-link @if(Request::segment(0) == 'rider') active @endif">
                            <i class="nav-icon fas fa-chart-pie" style="color: #fff;"></i>
                            <p style="color: #fff;">
                                Ticket
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('ticket')}}"
                                    class="nav-link @if(Request::segment(2) == 'tickettype') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ticket Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('ticket.system')}}"
                                    class="nav-link @if(Request::segment(2) == 'system') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ticket System</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->promocodeview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('promocode')}}"
                            class="nav-link @if(Request::segment(1) == 'promocode') active @endif">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>
                                Promo Code
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->faqview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('faq')}}" class="nav-link @if(Request::segment(1) == 'faq') active @endif">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Faq
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->waiterview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('waiter')}}"
                            class="nav-link @if(Request::segment(1) == 'waiter') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Waiter
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->cmsview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('cms')}}" class="nav-link @if(Request::segment(1) == 'cms') active @endif">
                            <i class="nav-icon far fa-edit"></i>
                            <p>
                                Cms
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->taxview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('tax')}}" class="nav-link @if(Request::segment(1) == 'tax') active @endif">
                            <i class="nav-icon  far fa-newspaper"></i>
                            <p>
                                Tax
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->partnerview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('partner')}}"
                            class="nav-link @if(Request::segment(1) == 'partner') active @endif">
                            <i class="nav-icon  fas fa-user-tie"></i>
                            <p>
                                Partner
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->offerview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('offer')}}" class="nav-link @if(Request::segment(1) == 'offer') active @endif">
                            <i class="nav-icon 	fab fa-hotjar"></i>
                            <p>
                                Offers Management
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->notificationview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('notification')}}"
                            class="nav-link @if(Request::segment(1) == 'notification') active @endif">
                            <i class="nav-icon 	far fa-paper-plane"></i>
                            <p>
                                Send Notification
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->generalsettingview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('generalsetting')}}"
                            class="nav-link @if(Request::segment(1) == 'generalsetting') active @endif">
                            <i class="nav-icon 	fas fa-wrench"></i>
                            <p>
                                General Setting
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->firebaseview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('firebase')}}"
                            class="nav-link @if(Request::segment(1) == 'firebase') active @endif">
                            <i class="nav-icon 	fas fa-satellite-dish"></i>
                            <p>
                                Firebase Setting
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->emailsmtpview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('emailsmtp')}}"
                            class="nav-link @if(Request::segment(1) == 'emailsmtp') active @endif">
                            <i class="nav-icon 	fas fa-globe"></i>
                            <p>
                                Email SMTP Settings
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->paymentmethodview == 'on')
                    @else
                    <li class="nav-item menu-open">
                        <a href="{{route('paymentmethod')}}"
                            class="nav-link @if(Request::segment(1) == 'paymentmethod') active @endif">

                            <i class="nav-icon 	fas fa-money-check-alt"></i>
                            <p>
                                Payment Management
                            </p>
                        </a>
                    </li>
                    @endempty

                    @empty(@$datapermisstion->riderview == 'on')
                    @else
                    <li class="nav-item"
                        style="background-color: #494E53 !important; border-radius: 6px; margin-bottom: 4px;">
                        <a href="#" class="nav-link @if(Request::segment(0) == 'rider') active @endif">
                            <i class="nav-icon fas 	fas fa-biking" style="color: #fff;"></i>
                            <p style="color: #fff;">
                                Delivery Boy
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('rider.create')}}"
                                    class="nav-link @if(Request::segment(2) == 'create') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Delivery Boy</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('rider')}}"
                                    class="nav-link @if(Request::segment(2) == 'rider') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Delivery Boy List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fund Transfers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cash Collection</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endempty
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong> {{ $footername }}.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script href="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/admin/dist/js/pages/dashboard2.js') }}"></script>


    <script>
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif

    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })

    </script>
</body>

</html>
