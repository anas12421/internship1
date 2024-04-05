@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Sub Menu Info</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('submenu.update' , $submenu->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">SubMenu Name</label>
                            <input type="text" name="name" class="form-control" id="" value="{{$submenu->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-3 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sub Menu Link</label>
                            <input type="text" name="link" class="form-control" id="" value="{{$submenu->link}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Sub Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
