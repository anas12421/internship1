@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Update Tag</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('tag.update' , $tag->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tag Name</label>
                            <input type="text" name="name" class="form-control" id="" value="{{$tag->name}}">
                            @error('name')
                            <div class="alert alert-danger mt-3">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
