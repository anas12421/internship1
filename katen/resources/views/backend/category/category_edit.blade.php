@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Update Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update' , $category->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="" value="{{$category->name}}">
                            @error('name')
                            <div class="alert alert-danger mt-3">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category Link</label>
                            <input type="text" name="link" class="form-control" id="" value="{{$category->link}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
