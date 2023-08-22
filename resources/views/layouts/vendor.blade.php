<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/') }}css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/favicon.png" />
    @yield('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{ route('admin') }}"><img
                        src="{{ asset('/') }}images/logo.svg" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin') }}"><img
                        src="{{ asset('/') }}images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('/') }}images/faces/face28.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                {{ Auth::user()->name }}
                            </a>
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="ti-power-off text-primary"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendor') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendor.portfolio') }}">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Add Portfolio</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendor.profile') }}">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">My Profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendor.vendor_bookings') }}">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">My Booking</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Sample</span>
                        </a>
                    </li>

                </ul>
            </nav>
            @yield('content');
        </div>
        <!-- page-body-wrapper ends -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('/') }}vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/') }}vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('/') }}vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('/') }}vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('/') }}js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/') }}js/off-canvas.js"></script>
    <script src="{{ asset('/') }}js/hoverable-collapse.js"></script>
    <script src="{{ asset('/') }}js/template.js"></script>
    <script src="{{ asset('/') }}js/settings.js"></script>
    <script src="{{ asset('/') }}js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/') }}js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    @yield('js')
</body>

</html>
