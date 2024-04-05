@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">

                    <h3>Category List</h3>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success mt-3">{{session('delete')}}</div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-success mt-3">{{session('update')}}</div>
                    @endif
                    <table id="category" class="display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $sl=>$category )

                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->link}}</td>
                                <td>
                                    <a href="{{route('category.edit' ,$category->id )}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <a href="{{route('category.delete' ,$category->id )}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success mt-3">{{session('success')}}</div>
                    @endif
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="">
                            @error('name')
                            <div class="alert alert-danger mt-3">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category Link</label>
                            <input type="text" name="link" class="form-control" id="">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        let table = new DataTable('#category');
    </script>
@endsection
