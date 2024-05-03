@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3><span class="text-success">{{$noti_info->name}}</span> Comment on <strong class="text-danger">{{$noti_info->rel_to_blog->title}}</strong></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>{{$noti_info->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$noti_info->email}}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{$noti_info->website}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{$noti_info->description}}</td>
                        </tr>
                    </table>

                    <h4 class="mt-5">Reply To {{$noti_info->name}}</h4>

                    <form action="{{route('reply.auth')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" class="form-control" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="comment_id" value="{{$noti_info->id}}">
                        <input type="hidden" name="blog_id" value="{{$noti_info->blog_id}}">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
