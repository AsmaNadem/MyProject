<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Management</title>
    <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css')}}">
{{--    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>--}}
{{--    <script src="{{asset('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js')}}"></script>--}}
{{--    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css')}}" />--}}



{{--    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>--}}
    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css/sb-admin-2.min.css")}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
{{--                <i class="fas fa-laugh-wink"></i>--}}
            </div>
            <div class="sidebar-brand-text mx-3">Employee System<sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('posts')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Management</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Manage</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage </h6>
{{--                    @can('access-employees')--}}
                    <a class="collapse-item" href="{{route('employees.index')}}">Employees</a>
{{--                    @endcan--}}
{{--                    @can('access-projects')--}}
                    <a class="collapse-item" href="{{route('projects.index')}}">Projects</a>
{{--                    @endcan--}}
{{--                        @can('access-tasks')--}}
                    <a class="collapse-item" href="{{route('tasks.index')}}">Tasks</a>
{{--                    @endcan--}}
{{--                            @can('access-programmingLanguage')--}}
                    <a class="collapse-item" href="{{route('programmingLanguages.index')}}">Programming Languages</a>
{{--                    @endcan--}}
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Notifications</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Notification:</h6>
                    <a class="collapse-item" href="{{route('custom-notifications.index')}}">Custom Notifications</a>
                </div>
            </div>

            {{--                    <a class="collapse-item" href="buttons.html">Project</a>--}}
{{--                    <a class="collapse-item" href="{{url('cards')}}">Task</a>--}}
{{--                    <a class="collapse-item" href="{{url('cards')}}">Programming Language</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->


{{--        <hr class="sidebar-divider">--}}

{{--        <!-- Heading -->--}}
{{--        <div class="sidebar-heading">--}}
{{--            Addons--}}
{{--        </div>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--               aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--                <i class="fas fa-fw fa-wrench"></i>--}}
{{--                <span>Employee</span>--}}
{{--            </a>--}}
{{--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
{{--                 data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Assign to employee: </h6>--}}
{{--                    <a class="collapse-item" href="{{route('employees.index')}}">Employees</a>--}}
{{--                    <a class="collapse-item" href="{{route('projects.index')}}">Projects</a>--}}
{{--                    <a class="collapse-item" href="{{route('tasks.index')}}">Tasks</a>--}}
{{--                    <a class="collapse-item" href="{{route('programmingLanguage.index')}}">Programming Languages</a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>




        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Authentication:</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Auth Screens:</h6>
                    @can('access-roles')
                    <a class="collapse-item" href="{{route('roles.index')}}">Roles</a>
                    @endcan
{{--                    <a class="collapse-item" href="{{route('auth.login')}}">Login</a>--}}
{{--                    <a class="collapse-item" href="{{route('users.index')}}">Users</a>--}}
                   @can('access-users')
                    <a class="collapse-item" href="{{route('users.index')}}">Users</a>
                    @endcan

{{--                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--                        <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                            <h6 class="collapse-header">Notification:</h6>--}}


{{--                    @can('access-users')--}}
{{--                    <a class="collapse-item" href="{{route('custom-notifications.index')}}">Custom Notifications</a>--}}
{{--                    @endcan--}}
                    <div class="collapse-divider"></div>
{{--                    <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('users.index')}}">Users</a>--}}
{{--                    <a class="collapse-item" href="blank.html">Blank Page</a>--}}
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Display</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Control</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
{{--        <div class="sidebar-card d-none d-lg-flex">--}}
{{--            <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">--}}
{{--            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>--}}
{{--            <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>--}}
{{--        </div>--}}

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                @include('shared.nav')

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
{{--                <a class="btn btn-secondary" href="login.html">Logout</a>--}}
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
<script src="{{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

{{--<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js')}}"></script>--}}
<script src="{{asset('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset("js/sb-admin-2.min.js")}}"></script>

<!-- Page level plugins -->
<script src="{{asset("vendor/chart.js/Chart.min.js")}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset("js/demo/chart-area-demo.js")}}"></script>
<script src="{{asset("js/demo/chart-pie-demo.js")}}"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@include('shared.fcm')
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@yield('scripts')

<script>

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</html>
