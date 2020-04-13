<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex,nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <meta content="" name="description" />

        <meta content="Developer" name="Maynard Magallen" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon-16x16.png') }}">

        <!-- Sweet Alert-->
        <link href="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Notification css (Toastr) -->
        <link href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Custom box css -->
        <link href="{{ asset('admin/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        @yield('css')
    </head>

    <body>

        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>
        <!-- End Preloader-->

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">


<!-- Notification -->
                    <li class="dropdown notification-list">

                        {{--  <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">{{ auth()->user()->unreadNotifications()->count()  }}</span>
                        </a>  --}}
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            {{--  <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="{{ route('markAllAsRead') }}" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>  --}}

                            {{--  <div class="slimscroll noti-scroll">
                                @forelse (auth()->user()->unreadNotifications as $notification)
                                    <!-- item-->
                                    <a href="{{ route('markRead', $notification->id) }}" class="dropdown-item notify-item active" data-toggle="tooltip" data-placement="top" title="{{ $notification->created_at->format('F d, Y') }}">
                                        <div class="notify-icon">
                                            <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <p class="notify-details font-13">{{ $notification->data['title'] .' '. $notification->data['data']}}</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                        </p>
                                    </a>
                                @empty
                                    <div class="text-center">
                                        <img src="{{ asset('admin/assets/images/vector/no-message-80x80.png') }}" alt="no-notification" class="mx-auto d-block">
                                        <p class="notify-details">Looks like its empty</p>
                                    </div>
                                @endforelse
                            </div>  --}}

                            {{--  <!-- All-->
                            <a href="{{ route('viewAllNotification') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>  --}}

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ route('home') }}" class="logo text-center">
                        {{-- <span class="logo-lg">
                            <h5 class="text-center display-6">Document Tracker</h5>
                        </span> --}}
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile disable-btn waves-effect">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <h4 class="page-title-main">@yield('title')</h4>
                    </li>

                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">
                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ asset('admin/assets/images/default-avatar.png') }}" alt="user-avatar" title="Maynard Magallen" class="rounded-circle img-thumbnail avatar-xl">
                        <div class="dropdown">
                            <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <a href="{{ route('change.password.index') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-shield-lock-outline mr-1"></i>
                                    <span>Password</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>
                        <p class="text-muted">{{ Ucwords(Auth::user()->roles()->get()->pluck('name')->first()) }}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('logout') }}" class="text-custom"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                        @can('sys_admin_rights')
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="mdi mdi-home"></i>
                                <span> Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.index') }}">
                                <i class="mdi mdi-account-group"></i>
                                <span> User Management</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['sys_admin_rights','clerk_rights'])
                        <li>
                            <a href="{{ route('record.index') }}">
                                <i class="mdi mdi-content-paste"></i>
                                <span> Receiving</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['sys_admin_rights','cos_rights'])
                        <li>
                            <a href="{{ route('cos.index') }}">
                                <i class="mdi mdi-content-paste"></i>
                                <span> Assigning</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['sys_admin_rights','admin_rights'])
                        <li>
                            <a href="{{ route('lawyer.index') }}">
                                <i class="mdi mdi-content-paste"></i>
                                <span> Admin | Lawyer Section</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['sys_admin_rights','admin_head_rights'])
                        <li>
                            <a href="{{ route('adminhead.index') }}">
                                <i class="mdi mdi-content-paste"></i>
                                <span> Admin Head Section</span>
                            </a>
                        </li>
                        @endcan

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">


                    @auth
                        <!-- Start Content-->
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                        <!-- container -->
                    @endauth

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            © {{ date('Y') }} Office of Student and Development Service. All rights reserved.
                        </div>
                        {{--  <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="{{ route('about') }}">About Us</a>
                                @can('user-privilege')
                                    <a href="#import-data" data-animation="rotate" data-plugin="custommodal" data-overlayColor="#36404a">Feedback</a>
                                @endcan
                                <a href="javascript:void(0);" id="version">Version</a>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            </footer>

        </div>
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

        <!-- knob plugin -->
        <script src="{{ asset('admin/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

        <!-- Dashboard init js-->
        {{-- <script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script> --}}

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet alert init js-->
        <script src="{{ asset('admin/assets/js/pages/sweet-alerts.init.js') }}"></script>

        <!-- Toastr js -->
        <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>

        <script src="{{ asset('admin/assets/js/pages/toastr.init.js') }}"></script>

        <!-- Custom Modal Script by Maynard Magallen -->
        <script src="{{ asset('admin/assets/js/custom_script.js') }}"></script>

        <!-- Modal-Effect -->
        <script src="{{ asset('admin/assets/libs/custombox/custombox.min.js') }}"></script>

        @yield('script')

        @include('utitilies.alert')

        {{--  <script>
            $('#confirm-delete').click(function () {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                  }).then(function (result) {
                    if (result.value) {
                      Swal.fire("Deleted!", "Your file has been deleted.", "success");
                    }
                });
            });
        </script>  --}}

    </body>
</html>
