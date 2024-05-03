@extends('frontend.master')

@section('content')




	<!-- hero section -->
	<section id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">


					<!-- featured post large -->
                    @foreach ($banner_blog as $banner )

					<div class="post featured-post-lg">
						<div class="details clearfix">
							<a href="category.html" class="category-badge">{{$banner->rel_to_cat->name}}</a>
							<h2 class="post-title"><a href="{{route('blog_single' , $banner->slug)}}">{{$banner->title}}</a></h2>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="#">{{$banner->author}}</a></li>
								<li class="list-inline-item text-uppercase">{{$banner->created_at->format('d M Y')}}</li>
							</ul>
						</div>
						<a href="blog-single.html">
							<div class="thumb rounded">
								<div class="inner data-bg-image" data-bg-image="{{asset('uploads/blogs')}}/{{$banner->photo}}"></div>
							</div>
						</a>
					</div>
                    @endforeach

				</div>

				<div class="col-lg-4">

					<!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>
							<!-- popular posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
								<!-- post -->

                                @foreach ($recent_blogs as $recent_blog )

								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="{{route('blog_single' , $recent_blog->slug)}}">
											<div class="inner">
												<img class="img_fix" src="{{asset('uploads/blogs')}}/{{$recent_blog->photo}}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{route('blog_single' , $recent_blog->slug)}}">{{$recent_blog->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item text-uppercase">{{$recent_blog->created_at->format('d M Y')}}</li>
										</ul>
									</div>
								</div>
                                @endforeach

							</div>
							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
								<!-- post -->
                                @foreach ($latest_blogs as $latest_blog )
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="{{route('blog_single' , $latest_blog->slug)}}">
                                                <div class="inner">
                                                    <img class="img_fix" src="{{asset('uploads/blogs')}}/{{$latest_blog->photo}}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="{{route('blog_single' , $latest_blog->slug)}}">{{$latest_blog->title}}</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item text-uppercase">{{$latest_blog->created_at->format('d M Y')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

					<!-- section header -->




					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Latest Posts</h3>
						<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">

						<div class="row">

							<div class="col-md-12 col-sm-6">
								<!-- post -->

                                @foreach ($latest_blogs as $latest_post )

								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<span class="post-format-sm">
											<i class="icon-picture"></i>
										</span>
										<a href="{{route('blog_single' , $latest_post->slug)}}">
											<div class="inner">
												<img src="{{asset('uploads/blogs')}}/{{$latest_post->photo}}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="#"><img src="{{asset('frontend_asset')}}/images/other/author-sm.png" class="author" alt="author"/>{{$latest_post->author}}</a></li>
											<li class="list-inline-item"><a href="#">{{$latest_post->rel_to_cat->name}}</a></li>
											<li class="list-inline-item text-uppercase">{{$latest_post->created_at->format('d M Y')}}</li>
										</ul>
										<h5 class="post-title"><a href="{{route('blog_single' , $latest_post->slug)}}">{{$latest_post->title}}</a></h5>
										{{-- <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p> --}}
										<div class="post-bottom clearfix d-flex align-items-center">
											<div class="social-share me-auto">
												<button class="toggle-button icon-share"></button>
												<ul class="icons list-unstyled list-inline mb-0">
													<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
												</ul>
											</div>
											{{-- <div class="more-button float-end">
												<a href="blog-single.html"><span class="icon-options"></span></a>
											</div> --}}
										</div>
									</div>
								</div>
                                @endforeach
							</div>



						</div
						>
						<!-- load more button -->


					</div>

				</div>
				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{asset('frontend_asset')}}/images/map-bg.png">
								<img src="{{asset('frontend_asset')}}/images/logo.svg" alt="logo" class="mb-4" />
								<p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
								<ul class="social-icons list-unstyled list-inline mb-0">
									<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>

						<!-- widget popular posts -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Popular Posts</h3>
								<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<!-- post -->
                                @foreach ($recent_blogs as $sl=>$recent_blog )

								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<span class="number">{{$sl+1}}</span>
										<a href="{{route('blog_single' , $recent_blog->slug)}}">
											<div class="inner">
												<img class="img_fix" src="{{asset('uploads/blogs')}}/{{$recent_blog->photo}}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{route('blog_single' , $recent_blog->slug)}}">{{$recent_blog->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item text-uppercase">{{$recent_blog->created_at->format('d M Y')}}</li>
										</ul>
									</div>
								</div>
                                @endforeach

							</div>
						</div>

						<!-- widget categories -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Explore Topics</h3>
								<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<ul class="list">
                                    @foreach ($categories as $category )
									<li><a href="{{route('category.view' , $category->id)}}" class="text-capitalize">{{$category->name}}</a><span>({{App\Models\Blog::where('category_id' , $category->id)->count()}})</span></li>
                                    @endforeach
								</ul>
							</div>

						</div>

						<!-- widget newsletter -->
						<div class="widget rounded" id="subscriber">
							<div class="widget-header text-center">
								<h3 class="widget-title">Newsletter</h3>
								<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />
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

						<!-- widget post carousel -->


						{{-- <!-- widget advertisement -->
						<div class="widget no-container rounded text-md-center">
							<span class="ads-title">- Sponsored Ad -</span>
							<a href="#" class="widget-ads">
								<img src="{{asset('frontend_asset')}}/images/ads/ad-360.png" alt="Advertisement" />
							</a>
						</div> --}}

						<!-- widget tags -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Tag Clouds</h3>
								<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
                                @foreach ($tags as $tag)
								<button value="{{$tag->id}}" class="tag text-capitalize">#{{$tag->name}}</button>
                                @endforeach
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>
	</section>



    @endsection

    @section('footer_script')

    <script>

        $('.tag').click(function() {
            var tag = $(this).val();
            var link = "{{ route('search') }}" + "?tag=" + tag;
            window.location.href = link;
        })
    </script>
    @endsection
