@extends('frontend.master')


@section('content')
    <!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    @foreach (Request::segments() as $segment)
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ucwords($segment)}}
                    </li>
                @endforeach
                </ol>


            </nav>



					<!-- section header -->
					{{-- <div class="section-header">
						<h3 class="section-title">Comments ({{$comment->count()}})</h3>
						<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />
					</div> --}}
					<!-- post comments -->


					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header" id="comments">
						<h3 class="section-title">Reply To {{$comment->name}}</h3>
						<img src="{{asset('frontend_asset')}}/images/wave.svg" class="wave" alt="wave" />

                        @if (session('comment_success'))
                            <div class="alert alert-success mt-3">{{session('comment_success')}}</div>
                        @endif
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30">

						<form id="comment-form" action="{{route('reply.store')}}" class="comment-form" method="POST">
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
                            <input type="hidden" value="{{$comment->blog_id}}" name="blog_id">
                            <input type="hidden" value="{{$comment->id}}" name="comment_id">

							<button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button><!-- Submit Button -->

						</form>
					</div>
                </div>


			</div>

		</div>
	</section>
@endsection

