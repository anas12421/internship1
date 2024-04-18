<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:51 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        @foreach (Request::segments() as $segment ) {{ucwords($segment)}} @endforeach | Katen
    </title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/images/favicon.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/css/simple-line-icons.css" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/css/style.css" type="text/css" media="all">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            content: '';
        }
    </style>

</head>

<body>

    <!-- preloader -->
    {{-- <div id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div> --}}

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-personal">
            <div class="container-xl header-top">

            </div>

            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">

                    <div class="collapse navbar-collapse justify-content-center centered-nav">
                        <!-- menus -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="http://127.0.0.1:8000">Home</a>
                            </li>

                            @foreach ($categories as $category )

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.view' , $category->id)}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </nav>
        </header>

        <section class="page-header">
            <div class="container-xl">
                <div class="text-center">
                    <h1 class="mt-0 mb-2">{{$category_header->name}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            @foreach (Request::segments() as $segment)
                            <li class="breadcrumb-item" aria-current="page">
                                {{ucwords($segment)}}
                            </li>
                        @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!-- section main content -->
        <section class="main-content">
            <div class="container-xl">

                <div class="row gy-4">

                    <div class="col-lg-8">

                        <div class="row gy-4">

                            {{-- Posts --}}

                            <h3>Showing '{{$category_header->name}}' Blogs</h3>

                            @forelse ($category_blogs as $category_blog )

                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-grid rounded bordered">
                                    <div class="thumb top-rounded">
                                        <a href="{{route('category.view' , $category_blog->category_id)}}" class="category-badge position-absolute">{{$category_blog->rel_to_cat->name}}</a>
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{route('blog_single' , $category_blog->slug)}}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blogs') }}/{{$category_blog->photo}}"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="{{ asset('frontend_asset') }}/images/other/author-sm.png" class="author"
                                                        alt="author" />{{$category_blog->author}}e</a></li>
                                            <li class="list-inline-item">{{$category_blog->created_at->format('d M Y')}}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a href="{{route('blog_single' , $category_blog->slug)}}">{{$category_blog->title}}</a></h5>
                                        {{-- <p class="excerpt mb-0">I am so happy, my dear friend, so absorbed in the
                                            exquisite sense of mere tranquil existence.</p> --}}
                                    </div>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="blog-single.html"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h3 class="text-danger">No Blogs Found</h3>
                            @endforelse



                        </div>

                        {{-- <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                            </ul>
                        </nav> --}}

                    </div>
                    <div class="col-lg-4">

                        <!-- sidebar -->
                        <div class="sidebar">
                            <!-- widget about -->
                            <div class="widget rounded">
                                <div class="widget-about data-bg-image text-center"
                                    data-bg-image="{{ asset('frontend_asset') }}/images/map-bg.png">
                                    <img src="{{ asset('frontend_asset') }}/images/logo.svg" alt="logo"
                                        class="mb-4" />
                                    <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion,
                                        celebrity and lifestyle. We helps clients bring the right content to the right
                                        people.</p>
                                    <ul class="social-icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-medium"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- widget popular posts -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Popular Posts</h3>
                                    <img src="{{ asset('frontend_asset') }}/images/wave.svg" class="wave"
                                        alt="wave" />
                                </div>
                                <div class="widget-content">

                                    <!-- post -->

                                @foreach ($recent_blogs as $recent_blog )

								<div class="post post-list-sm circle mb-4">
									<div class="thumb circle">
										<a href="{{route('blog_single' , $recent_blog->slug)}}">
											<div class="inner">
												<img src="{{asset('uploads/blogs')}}/{{$recent_blog->photo}}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{route('blog_single' , $recent_blog->slug)}}">{{$recent_blog->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{$recent_blog->created_at->format('d M Y')}}</li>
										</ul>
									</div>
								</div>
                                @endforeach

                                </div>



                                <!-- widget newsletter -->
                                <div class="widget rounded" id="subscriber">
                                    <div class="widget-header text-center">
                                        <h3 class="widget-title">Newsletter</h3>
                                        <img src="{{ asset('frontend_asset') }}/images/wave.svg" class="wave"
                                            alt="wave" />
                                    </div>
                                    <div class="widget-content">
                                        @if (session('subscribe'))
                                            <div class="alert alert-info ">{{session('subscribe')}}</div>
                                        @endif
                                        <span class="newsletter-headline text-center mb-3">Join {{App\Models\Subscriber::count()}} subscribers!</span>
                                        <form method="POST" action="{{route('subscriber')}}">
                                            @csrf
                                            <div class="mb-2">
                                                <input class="form-control w-100 text-center" name="email" placeholder="Email address…" type="email">
                                            </div>
                                            <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                                        </form>
                                        <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
                                    </div>
                                </div>



                                <!-- widget tags -->
                                <div class="widget rounded">
                                    <div class="widget-header text-center">
                                        <h3 class="widget-title">Tag Clouds</h3>
                                        <img src="{{ asset('frontend_asset') }}/images/wave.svg" class="wave"
                                            alt="wave" />
                                    </div>
                                    @foreach ($tags as $tag)
                                    <button value="{{$tag->id}}" class="tag text-capitalize">#{{$tag->name}}</button>
                                    @endforeach
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
        </section>



        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i
                                    class="icon-arrow-up"></i>Back to Top</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form">
                <input class="form-control me-2" type="search" placeholder="Search and press enter ..."
                    aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="images/logo.svg" alt="Katen" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="active">
                    <a href="index.html">Home</a>
                    <ul class="submenu">
                        <li><a href="index.html">Magazine</a></li>
                        <li><a href="personal.html">Personal</a></li>
                        <li><a href="personal-alt.html">Personal Alt</a></li>
                        <li><a href="minimal.html">Minimal</a></li>
                        <li><a href="classic.html">Classic</a></li>
                    </ul>
                </li>
                <li><a href="category.html">Lifestyle</a></li>
                <li><a href="category.html">Inspiration</a></li>
                <li>
                    <a href="#">Pages</a>
                    <ul class="submenu">
                        <li><a href="category.html">Category</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                        <li><a href="blog-single-alt.html">Blog Single Alt</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('frontend_asset') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/js/jquery.sticky-sidebar.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/js/custom.js"></script>


    <script>
        $('.tag').click(function() {

            var tag = $(this).val();
            var link = "{{ route('search') }}" + "?tag=" + tag;
            window.location.href = link;
        })
    </script>

</body>

<!-- Mirrored from themeger.shop/html/katen/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:51 GMT -->

</html>
