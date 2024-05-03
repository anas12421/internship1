@extends('frontend.master')


@section('content')
    <!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>

                    @php
                        $breads = Request::segments();
                        array_pop($breads);
                    @endphp

                    @foreach ($breads as $segment)
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ucwords($segment)}}
                        </li>
                    @endforeach
                </ol>


            </nav>

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post header -->
						<div class="post-header">
							<h1 class="title mt-0 mb-3">{{$blog_info->title}}</h1>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="#"><img src="{{asset('frontend_asset')}}/images/other/author-sm.png" class="author" alt="author"/>{{$blog_info->author}}</a></li>
								<li class="list-inline-item"><a href="#" class="text-capitalize">{{$blog_info->rel_to_cat->name}}</a></li>
								<li class="list-inline-item">{{$blog_info->created_at->format('d M Y')}}</li>
							</ul>
						</div>
						<!-- featured image -->
						<div class="featured-image">
							<img src="{{asset('uploads/blogs')}}/{{$blog_info->photo}}" alt="post-title" />
						</div>
						<!-- post content -->
						<div class="post-content clearfix">
							{!!$blog_info->description!!}

						</div>
						<!-- post bottom section -->
						<div class="post-bottom">
							<div class="row d-flex align-items-center">
								<div class="col-md-6 col-12 text-center text-md-start">
									<!-- tags -->
									{{-- <a href="#" class="tag">#Trending</a>
									<a href="#" class="tag">#Video</a>
									<a href="#" class="tag">#Featured</a> --}}

                                    @php
                                        $after_explode = explode(',', $blog_info->tags);
                                     @endphp

                                    @foreach ($after_explode as $tag)
                                        <button value="{{App\Models\Tag::find($tag)->id}}" class="tag text-capitalize">#{{App\Models\Tag::find($tag)->name}}</button>
                                    @endforeach

								</div>
								<div class="col-md-6 col-12">
									<!-- social icons -->
									<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
										<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
							<img src="{{asset('frontend_asset')}}/images/other/avatar-about.png" alt="Katen Doe" />
						</div>
						<div class="details">
							<h4 class="name"><a href="#">{{$blog_info->author}}</a></h4>
							<p>{!!$blog_info->auth_desp!!}</p>
							<!-- social icons -->
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

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header" id="comments">
						<h3 class="section-title">Comments ({{$comments->count()}})</h3>
						<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />

                        @if (session('reply'))
                        <div class="alert alert-success mt-3">{{session('reply')}}</div>
                    @endif

					</div>
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded">

						<ul class="comments">
							<!-- comment item -->
                            @forelse ($comments as $comment )
							<li class="comment rounded">
								<div class="thumb">
									<img src="{{asset('frontend_asset')}}/images/other/comment-1.png" alt="John Doe" />
								</div>
								<div class="details">
									<h4 class="name"><a href="#">{{$comment->name}}</a></h4>
									{{-- <span class="date">Jan 08, 2021 14:41 pm</span> --}}
									<span class="date">{{$comment->created_at->format('M d, Y h:i a')}}</span>
									<p class="text-capitalize">{{$comment->description}}</p>
									<a href="{{route('reply' , $comment->id)}}" class="btn btn-default btn-sm">Reply</a>
								</div>
							</li>

                            @foreach (App\Models\Reply::where('comment_id', $comment->id)->get() as $reply)
                            <li class="comment child rounded">
								<div class="thumb">
									<img src="{{asset('frontend_asset')}}/images/other/comment-2.png" alt="John Doe" />
								</div>
								<div class="details">
									<h4 class="name"><a href="#">{{$reply->name}} <span class="text-success">{{$reply->author_status == 1 ? '( Author )' : ''}}</span> > {{$comment->name}} </a></h4>
									<span class="date">{{$reply->created_at->format('M d, Y h:i a')}}</span>
									<p>{{$reply->description}}</p>
									{{-- <a href="#" class="btn btn-default btn-sm">Reply</a> --}}
								</div>
							</li>
                            @endforeach

                            @empty
                            <li>
                                <h3 class="text-red">No Comment's Found</h3>
                            </li>
                            @endforelse




							<!-- comment item -->



						</ul>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header" id="comments">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />

                        @if (session('comment_success'))
                            <div class="alert alert-success mt-3">{{session('comment_success')}}</div>
                        @endif
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30">

						<form id="comment-form" action="{{route('comment.store')}}" class="comment-form" method="POST">
                            @csrf

							<div class="messages"></div>

							<div class="row">

								<div class="column col-md-12">
									<!-- Comment textarea -->
									<div class="form-group">
										<textarea id="InputComment" name="description" class="form-control" rows="4" placeholder="Your comment here..."></textarea>
									</div>
                                    @error('description')
                                        <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
								</div>

								<div class="column col-md-6">
									<!-- Email input -->
									<div class="form-group">
										<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email address" >
                                        @error('email')
                                            <div class="alert alert-danger mt-2">{{$message}}</div>
                                        @enderror
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Name input -->
									<div class="form-group">
										<input type="text" class="form-control" name="website" id="InputWeb" placeholder="Website" >
									</div>
								</div>

								<div class="column col-md-12">
									<!-- Email input -->
									<div class="form-group">
										<input type="text" class="form-control" id="InputName" name="name" placeholder="Your name" >
                                        @error('name')
                                        <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
									</div>
								</div>

							</div>
                            <input type="hidden" value="{{$blog_info->id}}" name="blog_id">
                            <input type="hidden" value="{{$blog_info->author_id}}" name="blog_author_id">

							<button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button><!-- Submit Button -->

						</form>
					</div>
                </div>

				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
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
											<li class="list-inline-item">{{$recent_blog->created_at->format('d M Y')}}</li>
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
						{{-- <div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Celebration</h3>
								<img src="images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<div class="post-carousel-widget">
									<!-- post -->
									<div class="post post-carousel">
										<div class="thumb rounded">
											<a href="category.html" class="category-badge position-absolute">How to</a>
											<a href="blog-single.html">
												<div class="inner">
													<img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">Katen Doe</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
									<!-- post -->
									<div class="post post-carousel">
										<div class="thumb rounded">
											<a href="category.html" class="category-badge position-absolute">Trending</a>
											<a href="blog-single.html">
												<div class="inner">
													<img src="images/widgets/widget-carousel-2.jpg" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">Katen Doe</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
									<!-- post -->
									<div class="post post-carousel">
										<div class="thumb rounded">
											<a href="category.html" class="category-badge position-absolute">How to</a>
											<a href="blog-single.html">
												<div class="inner">
													<img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">Katen Doe</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- carousel arrows -->
								<div class="slick-arrows-bot">
									<button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
									<button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div> --}}

						<!-- widget advertisement -->
						{{-- <div class="widget no-container rounded text-md-center">
							<span class="ads-title">- Sponsored Ad -</span>
							<a href="#" class="widget-ads">
								<img src="images/ads/ad-360.png" alt="Advertisement" />
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
