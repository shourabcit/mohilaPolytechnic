<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                    href="{{ Auth::user() ? route('home') : route('admin.dashboard') }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ Auth::user() ? route('home') : route('admin.dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                @hasanyrole('dept. head|admin','admin')
                {{-- DEPT HEAD SECTION STARTS --}}
                <hr class="sidebar-divider">
                <span class="text-light px-3">Dept. Head Approval</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('clearence.depthead') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Clearence Requests</span></a>
                </li>
                {{-- DEPT HEAD SECTION ENDS --}}

                {{-- Add User --}}
                <hr class="sidebar-divider">
                <span class="text-light px-3">User Management</span>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#user_reg"
                        aria-expanded="true" aria-controls="user_reg">
                        <i class="fas fa-user"></i>
                        <span>User</span>
                    </a>
                    <div id="user_reg" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('admin.create') }}">Add User</a>
                            <a class="collapse-item" href="{{ route('admin.index') }}">All User</a>

                        </div>
                    </div>
                </li>
                {{-- // Add User --}}
                <hr class="sidebar-divider">
                <span class="text-light px-3">Department Management</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('category.create') }}">
                        <i class="far fa-building"></i>
                        <span>Departments</span></a>
                </li>

                {{-- student approvement --}}
                <hr class="sidebar-divider">

                <span class="text-light px-3">Students Management</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('student.index') }}">
                        {{-- <i class="fas fa-user"></i> --}}
                        <i class="fas fa-graduation-cap"></i>
                        <span>Students Approval</span></a>
                </li>
                {{-- student approvement --}}
                @endhasanyrole
                <!-- Divider -->
                <!-- Nav Item - Pages Collapse Menu -->
                @hasanyrole('craft instructor','admin')
                <hr class="sidebar-divider">
                <span class="text-light px-3">Equipments Management</span>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-archive"></i>
                        <span>Equipments</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('equipment.create') }}">Add Equipment</a>
                            <a class="collapse-item" href="{{ route('equipment.index') }}">All Equipment</a>
                            <a class="collapse-item" href="{{ route('equipment.trash') }}">All Trash Equipment</a>

                        </div>
                    </div>
                </li>

                {{-- CRAFT INSPECTOR SECTION START --}}
                {{-- 'craft instructor',
            'workshop super',
            'dept. head',
            'register',
            'vice principal',
            'principal' --}}
                <hr class="sidebar-divider">

                <span class="text-light px-3">Craft Inspector Section</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('resquest.index') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Requested Equipments</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('request.confirm.request') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Returned Equipments</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('clearence.craft') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Clearence Requests</span></a>
                </li>
                @endhasanyrole
                {{-- CRAFT INSPECTOR SECTION ENDS --}}
                {{-- WORKSHOP SUPER SECTION STARTS --}}
                @hasanyrole('workshop super', 'admin')
                <hr class="sidebar-divider">
                <span class="text-light px-3">Workshop Super Section</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('clearence.worksuper') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Clearence Requests</span></a>
                </li>
                @endhasanyrole
                {{-- WORKSHOP SUPER SECTION ENDS --}}


                {{-- REGISTER SECTION STARTS --}}
                @hasanyrole('register|admin')
                <hr class="sidebar-divider">
                <span class="text-light px-3">Register Section</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('clearence.register') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Clearence Requests</span></a>
                </li>
                @endhasanyrole
                {{-- REGISTER SECTION ENDS --}}

                {{-- Vice Principal SECTION STARTS --}}
                @hasanyrole('vice principal|admin','admin')
                <hr class="sidebar-divider">
                <span class="text-light px-3">Vice Principal</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('clearence.viceprincipal') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Clearence Requests</span></a>
                </li>
                @endhasanyrole
                {{-- Vice Principal SECTION ENDS --}}


                {{-- Principal SECTION STARTS --}}
                @hasanyrole('principal|admin','admin','web')

                <hr class="sidebar-divider">
                <span class="text-light px-3">Principal</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('clearence.principal') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Clearence Requests</span></a>
                </li>
                @endhasanyrole
                {{-- Vice Principal SECTION ENDS --}}
                @if (Auth::guard('admin')->check())
                {{-- <span class="text-light px-3">{{ Auth::user()->roles()->get() }}</span>p --}}

                @else

                <span class="text-light px-3">Student Guard  Section</span>

                @endif
                {{-- STUDENT SECTION START--}}
                @role('student','web')
                <hr class="sidebar-divider">
                <span class="text-light px-3">Students Section</span>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('resquest.create') }}">
                        </i><i class="fas fa-tools"></i>
                        <span>Equipment Request</span></a>
                </li>
                @endrole


                {{-- STUDENT SECTION ENDS--}}




                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter" id="notifyBadge">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown" id="notificationDiv"
                                    style="max-height: 650px; overflow-y:auto;">
                                    <h6 class="dropdown-header">
                                        Notifications
                                    </h6>
                                    @if(Auth::user() == false)
                                    @forelse (Auth::guard('admin')->user()->unreadNotifications as $notification)

                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ $notification->data['url'] }}">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <img src="{{ $notification->data['img'] }}" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small  text-capitalize">{{ $notification->data['name'] }}</div>
                                            <span class="font-weight-bold">{{ $notification->data['message'] }} from {{
                                            $notification->data['name'] }}</span>
                                        </div>
                                    </a>

                                    @empty
                                    <p class="text-center pt-4">No Notification</p>
                                    @endforelse
                                    @endif
                                    <a class="dropdown-item text-center small text-gray-500"
                                        href="{{ route('notify.clear') }}">Clear All
                                        Notifications</a>
                                </div>
                            </li>



                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        @if (Auth::user())
                                        {{ Auth::user()->name}}
                                        @else
                                        {{ Auth::guard('admin')->user()->name}}
                                        @endif
                                    </span>
                                    <img class="img-profile rounded-circle" src="
                                    @if (Auth::user())
                                        {{ Auth::user()->img}}
                                        @else
                                        {{ Auth::guard('admin')->user()->img}}
                                        @endif
                                    ">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"
                                        href="{{ (Auth::user()?route('logout'):route('admin.logout')) }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form"
                                        action="{{ (Auth::user()?route('logout'):route('admin.logout')) }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/js/easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
        @yield('custom_js')
        <script>
            // NOTIFICATION BADGE NUMBER
        let notifications = $('#notificationDiv a');
            let array = notifications.toArray()
            let notifyBadge = $('#notifyBadge');
            notifyBadge.html(array.length -1)
        </script>

    </body>

</html>