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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    @yield('style')
</head>

<body>
    <div id="app">
        <header class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img class="brand" src="/dash-assets/images/logo.png">
                    <a href="#" class="burger-btn d-block d-xl-none"> <i class="bi bi-justify fs-3"></i> </a>
                </div>
                <div class=" d-flex align-items-center">
                    <div class="dropdown">
                      <button class="btn  dropdown-toggle p-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <h6 class="user-name">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</h6>
                            <div class="online mb-0"><span class="online-ciral"></span>online</div>
                        </div>
                        <div  class="mx-3">
                            <img class="user-img" src="{{ asset(Auth()->user()->image ?? 'Images1645471326banner_two_img.PNG') }}">
                        </div>
                    </div>
                    <a class="btn bg-transparent" href="javascript:void(0);"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img src="/dash-assets/images/Frame (1).png"></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                    </div>

            </div>
         
        </header>
        <!-- Sidebar Start -->
        {{--<aside class="sidebar-wrapper">
            <div class="logo-wrapper">
                <a href="/" class="admin-logo">
                    <h5 class="text-center text-white">TRAMEC</h5>
                    <!--    <img src="/dash-assets/images/logo.png" alt="" class="sp_logo">
                    <img src="/{{ asset('dash-assets/images/mini_logo.png') }}" alt="" class="sp_mini_logo"> -->
                </a>
            </div>
            <div class="side-menu-wrap">
                <ul class="main-menu">
                    <li>
                        <a href="{{ route('admin.home') }}" class="active">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </span>
                            <span class="menu-text">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-package">
                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </span>
                            <span class="menu-text">
                                Product
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/documents">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-package">
                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </span>
                            <span class="menu-text">
                                Document
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <span class="menu-text">
                                Users Management
                            </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/admin/permissions">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Permissions
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/roles">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Roles
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/users">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Users
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/paid-users">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-package">
                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </span>
                            <span class="menu-text">
                                Paid Users
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <span class="menu-text">
                                Settings
                            </span>
                        </a>
                        <ul class="sub-menu">
                             
                            @can('content_access')
                            <li>
                                <a href="{{ url('admin/content') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Website Content
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('brand_access')
                            <li>
                                <a href="{{ url('admin/brand') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Brands
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('review_access')
                            <li>
                                <a href="{{ url('admin/review') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Reviews
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('sector_access')
                            <li>
                                <a href="{{ url('admin/sector') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Sectors
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('support_access')
                            <li>
                                <a href="{{ url('admin/support') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Supports
                                    </span>
                                </a>
                            </li>
                            @endcan
                            {{-- @can('service_access')
                                <li>
                                    <a href="{{ url('admin/service') }}">
                                        <span class="icon-dash">
                                        </span>
                                        <span class="menu-text">
                                            Services
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('news_access')
                            <li>
                                <a href="{{ url('admin/news') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        News
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('abbreviation_access')
                            <li>
                                <a href="{{ url('admin/abbreviation') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Abbreviations
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('rank_access')
                            <li>
                                <a href="{{ url('admin/rank') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Ranks
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('reason_access')
                            <li>
                                <a href="{{ url('admin/reason') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Reason of Awards
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('type_medal_access')
                            <li>
                                <a href="{{ url('admin/typemedal') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Type of Medals
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('country_access')
                            <li>
                                <a href="{{ url('admin/country') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Countries
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('writing_point_access')
                            <li>
                                <a href="{{ url('admin/writing_point') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Writing Points
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('support_access')
                            <li>
                                <a href="{{ url('admin/support') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Supports
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('review_access')
                            <li>
                                <a href="{{ url('admin/review') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Reviews
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('contact_access')
                            <li>
                                <a href="{{ url('admin/contact') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Contact Mail
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('media_access')
                            <li>
                                <a href="{{ url('admin/media') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Social Media
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('faq_category_access')
                            <li>
                                <a href="{{ url('admin/faq_category') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        FAQ Categories
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('faq_access')
                            <li>
                                <a href="{{ url('admin/faq') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        FAQ
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('newsletter_access')
                            <li>
                                <a href="{{ url('admin/newsletter') }}">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Newsletter
                                    </span>
                                </a>
                            </li>
                            @endcan 
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>--}}
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
                                        <a href="@if(Auth()->user()->is_admin){{url('/admin')}} @else {{url('/dashbaord')}} @endif"><i class="fas fa-home mr-2"></i>Dashboard</a>
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
                        <div class="toggler"> <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a> </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item active ">
                            <a href="@if(Auth()->user()->is_admin){{url('/admin/admin')}} @else {{url('/dashboard')}} @endif" class='sidebar-link'> <i class="bi bi-grid-fill"></i> <span>Dashboard</span> </a>
                        </li>
                        @if(Auth()->user()->is_admin)
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'> <i class="bi bi-stack"></i> <span>Users Management</span> </a>
                            <ul class="submenu ">
                                <li class="submenu-item "> <a href="/admin/permissions">Permissions</a> </li>
                                <li class="submenu-item "> <a href="/admin/roles">Roles</a> </li>
                                <li class="submenu-item "> <a href="/admin/users">Users</a> </li>
                               
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/admin/paid-users" class='sidebar-link'> <i class="bi bi-life-preserver"></i> <span>Paid User</span> </a>
                        </li>
                        @can('job_access')
                        <li class="sidebar-item  ">
                            <a href="/admin/job" class='sidebar-link'> <i class="bi bi-life-preserver"></i> <span>Jobs</span> </a>
                        </li>
                        @endcan
                        @can('quiz_access')
                        <li class="sidebar-item  ">
                            <a href="/admin/quiz" class='sidebar-link'> <i class="bi bi-book"></i> <span>Quiz</span> </a>
                        </li>
                        @endcan
                        @can('video_interview_access')
                        <li class="sidebar-item  ">
                            <a href="/admin/interview" class='sidebar-link'> <i class="bi bi-calendar2-check"></i> <span>Interview</span> </a>
                        </li>
                        @endcan
                        @can('result_access')
                        <li class="sidebar-item  ">
                            <a href="/admin/result" class='sidebar-link'> <i class="bi bi-calendar2-check"></i> <span>Result</span> </a>
                        </li>
                        @endcan
                        @can('assessment_access')
                        <li class="sidebar-item  ">
                            <a href="/admin/assessment" class='sidebar-link'> <i class="bi bi-book"></i> <span>Assessments</span> </a>
                        </li>
                        @endcan
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'> <i class="bi bi-eye"></i> <span>Guidance</span> </a>
                            <ul class="submenu ">
                                @can('app_process_access')
                                <li class="submenu-item "> <a href="/admin/app_process">Application Process</a> </li>
                                @endcan
                                @can('cv_guide_access')
                                <li class="submenu-item "> <a href="/admin/cv_guide">CV Writing</a> </li>
                                @endcan
                                @can('cover_guide_access')
                                <li class="submenu-item "> <a href="/admin/cover_guide">Cover Letter</a> </li>
                                @endcan
                                @can('test_guide_access')
                                <li class="submenu-item "> <a href="/admin/test_guide">Test Online</a> </li>
                                @endcan
                                @can('interview_guide_access')
                                <li class="submenu-item "> <a href="/admin/interview_guide">Interview Tips</a> </li>
                                @endcan
                                {{-- @can('brand_access')
                                <li class="submenu-item "> <a href="/admin/brand">Brands</a> </li>
                                @endcan
                                @can('sector_access')
                                <li class="submenu-item "> <a href="/admin/sector">Sectors</a> </li>
                                @endcan
                                @can('review_access')
                                <li class="submenu-item "> <a href="/admin/review">Reviews</a> </li>
                                @endcan
                                @can('support_access')
                                <li class="submenu-item "> <a href="/admin/support">Support</a> </li>
                                @endcan --}}
                               
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'> <i class="bi bi-shield"></i> <span>Settings</span> </a>
                            <ul class="submenu ">
                                @can('content_access')
                                <li class="submenu-item "> <a href="/admin/content">Website Content</a> </li>
                                @endcan
                                @can('brand_access')
                                <li class="submenu-item "> <a href="/admin/brand">Brands</a> </li>
                                @endcan
                                @can('sector_access')
                                <li class="submenu-item "> <a href="/admin/sector">Sectors</a> </li>
                                @endcan
                                @can('review_access')
                                <li class="submenu-item "> <a href="/admin/review">Reviews</a> </li>
                                @endcan
                                @can('support_access')
                                <li class="submenu-item "> <a href="/admin/support">Support</a> </li>
                                @endcan
                               
                            </ul>
                        </li>
                        @else
                        @can('resume_upload_access')
                        <li class="sidebar-item  ">
                            <a href="/resume_upload" class='sidebar-link'> <i class="bi bi-receipt-cutoff"></i> <span>Upload Resume</span> </a>
                        </li>
                        @endcan
                        @can('user_assessment_access')
                        <li class="sidebar-item  ">
                            <a href="/user-assessment" class='sidebar-link'> <i class="bi bi-book-half"></i> <span>Assessment</span> </a>
                        </li>
                        @endcan
                        @can('user_test_access')
                        <li class="sidebar-item  ">
                            <a href="/test-list" class='sidebar-link'> <i class="bi bi-book"></i> <span>Test</span> </a>
                        </li>
                        @endcan
                        @can('user_result_access')
                        <li class="sidebar-item  ">
                            <a href="/result" class='sidebar-link'> <i class="bi bi-card-checklist"></i> <span>Result</span> </a>
                        </li>
                        @endcan
                        @can('user_interview_access')
                        <li class="sidebar-item  ">
                            <a href="/user-interview" class='sidebar-link'> <i class="bi bi-calendar"></i> <span>Interview</span> </a>
                        </li>
                        @endcan
                        @endif
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