@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Blog List</h3>
                    <a href="{{route('new.blog')}}" class="btn btn-primary">Write a New Blog</a>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success mb-3">{{session('delete')}}</div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-warning mb-3">{{session('status')}}</div>
                    @endif
                    @if (Auth::user()->role == 0)
                    <table id="ablogs" class="display">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Author</th>
                                <th>Blog Title</th>
                                <th>Thumbnail</th>
                                <th>Views</th>
                                <th>Publish Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($auth_blogs as $sl=>$auth_blog )

                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$auth_blog->author}}</td>
                                <td>{{$auth_blog->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/blogs')}}/{{$auth_blog->photo}}" width="100" alt="">
                                </td>
                                <td>{{$auth_blog->views}}</td>
                                <td>{{$auth_blog->created_at->format('d-M-Y')}}</td>

                                <td>
                                    <a href="{{route('blog.view' , $auth_blog->id)}}" class="btn btn-primary" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{route('blog.delete' , $auth_blog->id)}}" class="btn btn-danger" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <td colspan="6">
                                        <h3 class="text-info text-center">No Blog Found</h3>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    @else
                        <table id="blogs" class="display">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Author</th>
                                    <th>Blog Title</th>
                                    <th>Thumbnail</th>
                                    <th>Views</th>
                                    <th>Banner Status</th>
                                    <th>Publish Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $sl=>$blog )

                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$blog->author}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        <img src="{{asset('uploads/blogs')}}/{{$blog->photo}}" width="100" alt="">
                                    </td>
                                    <td>{{$blog->views}}</td>
                                    <td>
                                        @if ($blog->banner_status == 0)
                                        <a href="{{route('blog.banner.status' , $blog->id )}}" class="btn btn-primary">Deactivate</a>
                                        @else
                                        <a href="{{route('blog.banner.status' , $blog->id )}}" class="btn btn-success">Active</a>
                                        @endif
                                    </td>
                                    <td>{{$blog->created_at->format('d-M-Y')}}</td>

                                    <td>
                                        <a href="{{route('blog.view' , $blog->id)}}" class="btn btn-primary" title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{route('blog.delete' , $blog->id)}}" class="btn btn-danger" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h3 class="text-info text-center">No Blog Found</h3>
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection



@section('footer_script')
@if (Auth::user()->role == 0)
<script>
    let table = new DataTable('#ablogs');
</script>

@else

<script>
    let table = new DataTable('#blogs');
</script>
@endif


@endsection

