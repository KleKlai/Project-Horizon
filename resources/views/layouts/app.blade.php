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

        @yield('css')

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Notification css (Toastr) -->
        <link href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Custom box css -->
        <link href="{{ asset('admin/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        <!-- Sweet Alert-->
        <link href="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="slimscroll noti-scroll">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="/storage/profile/{{ Auth::user()->profile }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    {{ Ucwords(Auth::user()->name) }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                                <!-- item-->
                                <a href="{{ route('myprofile.index') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Profile</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{ route('home') }}" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('admin/assets/images/header.png') }}" alt="logo here" height="70">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="24">
                            </span>
                        </a>
                    </div>

                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->


            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            @include('layouts.navbar')

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->


        </header>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">
                @auth
                    @yield('content')
                @endauth
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        © {{ date('Y') }} Commission on Elections. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h4 class="m-0 text-white">DocTracker</h4>
            </div>
            <div class="slimscroll-menu rightbar-content">
                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="/storage/profile/{{ Auth::user()->profile }}" alt="user-img" title="Maynard Magallen" class="rounded-circle img-fluid">
                        <a href="{{ route('myprofile.index') }}" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                    </div>

                    <h5><a href="javascript: void(0);">{{ Ucwords(Auth::user()->name) }}</a> </h5>
                    <p class="text-muted mb-0"><small>{{ Ucwords(Auth::user()->roles()->get()->pluck('name')->first()) }}</small></p>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->


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
