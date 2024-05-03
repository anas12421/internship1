
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:38 GMT -->
<head>
    @php
        $breads = Request::segments();
        array_pop($breads);
    @endphp
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>@foreach ($breads as $segment ) {{ucwords($segment)}} @endforeach | Katen</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend_asset')}}/images/favicon.png">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{asset('frontend_asset')}}/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend_asset')}}/css/all.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend_asset')}}/css/slick.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend_asset')}}/css/simple-line-icons.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend_asset')}}/css/style.css" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            content: '' !important;
        }

        .img_fix{
            height: 55px;
            width: 55px
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
	<header class="header-default">
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<!-- site logo -->
				<a class="navbar-brand" href="http://127.0.0.1:8000/"><img src="{{asset('frontend_asset')}}/images/logo.svg" alt="logo" /></a>

				<div class="collapse navbar-collapse">
					<!-- menus -->
					<ul class="navbar-nav mr-auto">
                        @foreach (App\Models\Menu::all() as $menu )

                        <li class="nav-item {{$menu->name == 'home' ? 'active' : ''}}">
													<a class="nav-link text-capitalize" href='{{$menu->link}}'>{{$menu->name}}</a>
												</li>
                        @endforeach


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-capitalize" href="#">All Category</a>
                            <ul class="dropdown-menu">
                                @foreach (App\Models\Category::all() as $category )
                                        <li><a class="dropdown-item text-capitalize" href="{{route('category.view' , $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
						</li>



					</ul>
				</div>

				<!-- header right section -->
				<div class="header-right">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
					<!-- header buttons -->
					<div class="header-buttons">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>

    @yield('content')



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
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
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
		<div class="d-flex search-form">

			<input class="form-control me-2" id="search_input" type="search" placeholder="Search and press enter ...">
			<button class="btn btn-default btn-lg" id="search_btn" type="submit">
                <i class="icon-magnifier"></i>
            </button>
		</div>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
		<img src="{{asset('frontend_asset')}}/images/logo.svg" alt="Katen" />
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
<script src="{{asset('frontend_asset')}}/js/jquery.min.js"></script>
<script src="{{asset('frontend_asset')}}/js/popper.min.js"></script>
<script src="{{asset('frontend_asset')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend_asset')}}/js/slick.min.js"></script>
<script src="{{asset('frontend_asset')}}/js/jquery.sticky-sidebar.min.js"></script>
<script src="{{asset('frontend_asset')}}/js/custom.js"></script>
<script>
    $('#search_btn').click(function() {
        var search_val = $('#search_input').val();
        var link = "{{ route('search') }}" + "?search_val=" + search_val ;
        // alert(link)
        window.location.href = link;
    });

</script>
@yield('footer_script')

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->
</html>
