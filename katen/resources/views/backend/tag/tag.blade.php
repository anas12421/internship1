@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">

                    <h3>Tag List</h3>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success mt-3">{{session('delete')}}</div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-success mt-3">{{session('update')}}</div>
                    @endif
                    <table id="tag" class="display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $sl=>$tag )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$tag->name}}</td>
                                <td>
                                    <a href="{{route('tag.edit' ,$tag->id )}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <a href="{{route('tag.delete' ,$tag->id )}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
                    <h3>Add Tag</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success mt-3">{{session('success')}}</div>
                    @endif
                    <form action="{{route('tag.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tag</label>
                            <input type="text" name="name" class="form-control" id="">
                            @error('name')
                            <div class="alert alert-danger mt-3">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        let table = new DataTable('#tag');
    </script>
@endsection
