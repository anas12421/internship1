
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">


<!-- Mirrored from myrathemes.com/dashtrap/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    @php
        $breads = Request::segments();
        array_pop($breads);
    @endphp
    <title>
        @foreach ($breads as $segment ) {{ucwords($segment)}} @endforeach | Dashtrap
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend_asset')}}/images/favicon.ico">

    <link href="{{asset('backend_asset')}}/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- App css -->
    <link href="{{asset('backend_asset')}}/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('backend_asset')}}/css/icons.min.css" rel="stylesheet" type="text/css">

    <script src="{{asset('backend_asset')}}/js/config.js"></script>


</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a class='logo-light' href='{{route('dashboard')}}'>
                    <img src="{{asset('backend_asset')}}/images/logo-light.png" alt="logo" class="logo-lg" height="28">
                    <img src="{{asset('backend_asset')}}/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
                </a>

                <!-- Brand Logo Dark -->
                <a class='logo-dark' href='{{route('dashboard')}}'>
                    <img src="{{asset('backend_asset')}}/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
                    <img src="{{asset('backend_asset')}}/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
                </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>



                    @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{route('user')}}'>
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> User's </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#menu" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Menu's </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menu">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('menu')}}'>
                                        <span class="menu-text">Main Menu</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('submenu')}}'>
                                        <span class="menu-text">Sub Menu</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{route('category')}}'>
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Category </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{route('tag')}}'>
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Tag </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{route('subscriber.list')}}'>
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Subscriber </span>
                        </a>
                    </li>
                    @endif

                    <li class="menu-item">
                        <a href="#blog" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Blog </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="blog">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('new.blog')}}'>
                                        <span class="menu-text">Write a Blog</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('blog.list')}}'>
                                        <span class="menu-text">Blog List</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{route('notification')}}'>
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Notification </span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='index.html'>
                                <img src="{{asset('backend_asset')}}/images/logo-light.png" alt="logo" class="logo-lg" height="22">
                                <img src="{{asset('backend_asset')}}/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <img src="{{asset('backend_asset')}}/images/logo-dark.png" alt="dark logo" class="logo-lg" height="22">
                                <img src="{{asset('backend_asset')}}/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-magnify font-size-24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>


                        <li class="dropdown d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('backend_asset')}}/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="18">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('backend_asset')}}/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('backend_asset')}}/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('backend_asset')}}/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('backend_asset')}}/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell font-size-24"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">{{App\Models\Comment::where('blog_author_id' , Auth::user()->id)->where('status' , 0)->count()}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-size-16 fw-semibold"> Notification</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                <small>Clear All</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-1" style="max-height: 300px;" data-simplebar>

                                    @forelse ( App\Models\Comment::where('blog_author_id' , Auth::user()->id)->where('status' , 0)->get() as $noti )

                                    <a href="{{route('notification.view' ,$noti->id )}}" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-size-14">{{$noti->name}} <small class="fw-normal text-muted ms-1">{{$noti->created_at->diffForHumans()}}</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Comment on {{$noti->rel_to_blog->title}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @empty
                                    <h5>No New Notification</h5>
                                    @endforelse


                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>

                                <!-- All-->
                                <a href="{{route('notification')}}" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if (Auth::user()->photo == null)

                                <img src="{{asset('backend_asset')}}/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle">

                                @else

                                <img src="{{asset('uploads/users')}}/{{Auth::user()->photo}}" alt="user-image" class="rounded-circle">

                                @endif
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{route('auth.user')}}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a> --}}

                                <!-- item-->
                                {{-- <a class='dropdown-item notify-item' href='pages-lock-screen.html'>
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a> --}}

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <a class='dropdown-item notify-item' href='{{route('logout')}}' onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        <i class="fe-log-out"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>


                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="py-3 py-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="page-title mb-0"> @foreach ($breads as $segment ) {{ucwords($segment)}} @endforeach</h4>
                            </div>
                            <div class="col-lg-6">
                               <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    @foreach ($breads as $segment)
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ucwords($segment)}}
                                        </li>
                                    @endforeach
                                </ol>
                               </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © Dashtrap</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://myrathemes.com/" target="_blank">MyraStudio</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{asset('backend_asset')}}/js/vendor.min.js"></script>
    <script src="{{asset('backend_asset')}}/js/app.js"></script>

    <!-- Knob charts js -->
    <script src="{{asset('backend_asset')}}/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Sparkline Js-->
    <script src="{{asset('backend_asset')}}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script src="{{asset('backend_asset')}}/libs/morris.js/morris.min.js"></script>

    <script src="{{asset('backend_asset')}}/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="{{asset('backend_asset')}}/js/pages/dashboard.js"></script>
    @yield('footer_script')

</body>


<!-- Mirrored from myrathemes.com/dashtrap/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:30 GMT -->
</html>
