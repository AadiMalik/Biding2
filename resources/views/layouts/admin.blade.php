<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dash-assets/css/bootstrap.css">
    <link rel="stylesheet" href="/dash-assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/dash-assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/dash-assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/dash-assets/css/app.css">
    <link rel="shortcut icon" href="/dash-assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    @yield('style')
</head>

<body>
    <div id="app">
        <header class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img class="brand" src="assets/images/Logo subastek sin fondo.png" style="height: 45px;">
                    <a href="#" class="burger-btn d-block d-xl-none"> <i class="bi bi-justify fs-3"></i> </a>
                </div>
                <div class=" d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle p-1" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="pl-1" src="/dash-assets/images/Frame.png">
                        </button>
                        <ul class="dropdown-menu notifiaction" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">lorem plsuam dolor waht you can do it</a></li>
                            <li><a class="dropdown-item" href="#">lorem plsuam dolor waht you can do it</a></li>
                            <li><a class="dropdown-item" href="#">lorem plsuam dolor waht you can do it</a></li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <div class="d-none d-md-block">
                            <h6 class="user-name">{{ Auth()->user()->first_name }} {{ Auth()->user()->last_name }}</h6>
                            <div class="online mb-0"><span class="online-ciral"></span>online</div>
                        </div>
                        <div class="mx-3">
                            <img class="user-img"
                                src="{{ asset(Auth()->user()->image ?? 'Images1645471326banner_two_img.PNG') }}">
                        </div>
                    </div>
                    <a class="btn bg-transparent" href="javascript:void(0);"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img
                            src="/dash-assets/images/Frame (1).png"></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>

        </header>
        <!-- Sidebar Start -->
        <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title bold">Dashboard</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a
                                            href="@if (Auth()->user()->is_admin) {{ url('/admin') }} @else {{ url('/dashbaord') }} @endif"><i
                                                class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Admin</li>
                                </ul>
                            </div>
                        </div>
                        <div id="sidebar" class="active">
                            <div class="sidebar-wrapper active">
                                <div class="sidebar-header">
                                    <div class="d-flex justify-content-between">
                                        <!--  <div class="logo">
                <a href="index.html"><img src="dash-assets/images/logo/logo.png" alt="Logo" srcset=""></a>
            </div> -->
                                        <div class="toggler"> <a href="#"
                                                class="sidebar-hide d-xl-none d-block"><i
                                                    class="bi bi-x bi-middle"></i></a> </div>
                                    </div>
                                </div>
                                <div class="sidebar-menu">
                                    <ul class="menu">
                                        <li class="sidebar-item active ">
                                            <a href="@if (Auth()->user()->is_admin) {{ url('/admin/admin') }} @else {{ url('/dashboard') }} @endif"
                                                class='sidebar-link'> <i class="bi bi-grid-fill"></i>
                                                <span>Dashboard</span> </a>
                                        </li>
                                        @can('user_management_access')
                                            <li class="sidebar-item  has-sub">
                                                <a href="#" class='sidebar-link'> <i class="bi bi-stack"></i>
                                                    <span>Users Management</span> </a>
                                                <ul class="submenu ">
                                                    <li class="submenu-item "> <a
                                                            href="/admin/permissions">Permissions</a> </li>
                                                    <li class="submenu-item "> <a href="/admin/roles">Roles</a> </li>
                                                    <li class="submenu-item "> <a href="/admin/users">Users</a> </li>

                                                </ul>
                                            </li>
                                            @endcan
                                            {{-- <li class="sidebar-item  ">
                                                <a href="/admin/paid-users" class='sidebar-link'> <i
                                                        class="bi bi-life-preserver"></i> <span>Paid User</span> </a>
                                            </li> --}}
                                            
                                    </ul>
                                </div>
                                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                            </div>
                        </div>
                        <div id="main">
                            @yield('content')
                        </div>
                    </div>
                    <script src="/dash-assets/js/jquery.min.js"></script>
                    <script src="/dash-assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                    <script src="/dash-assets/js/bootstrap.bundle.min.js"></script>
                    <script src="/dash-assets/vendors/apexcharts/apexcharts.js"></script>
                    <script src="/dash-assets/js/pages/dashboard.js"></script>
                    <script src="/dash-assets/js/mazer.js"></script>
                    @yield('script')
</body>

</html>
