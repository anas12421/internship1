@extends('layouts.admin');


@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Auth User Info</h2>

            </div>
            <div class="card-body">
                @if (session('updated'))
                <div class="alert alert-success">{{session('updated')}}</div>
                @endif
                <form class="forms-sample" action="{{route('auth.info.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>

                    {{-- <div class="form-group">
                        <label>Role</label>
                        <input type="number" class="form-control" name="role" maxlength="5" value="{{Auth::user()->role}}">
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
                    </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Auth User Password</h2>

            </div>
            <div class="card-body">
                @if (session('pass_update'))
                <div class="alert alert-success">{{session('pass_update')}}</div>
                @endif
                <form class="forms-sample" action="{{route('auth.password.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label >Current Password</label>
                        <input type="password" class="form-control" name="current_password">
                        @error('current_password')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                        @if (session('wrong'))
                        <div class="alert alert-danger">{{session('wrong')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label >New Password</label>
                        <input type="password" class="form-control" name="password" >
                        @error('password')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" >
                        @error('password_confirmation')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label>Role</label>
                        <input type="number" class="form-control" name="role" maxlength="5" value="{{Auth::user()->role}}">
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
                    </div>
    </div>



    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Auth User Photo Update</h2>

            </div>
            <div class="card-body">
                @if (session('photo_updated'))
                <div class="alert alert-success">{{session('photo_updated')}}</div>
                @endif
                <form class="forms-sample" action="{{route('auth.photo.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label >Photo</label>
                        <input type="file" class="form-control" name="profile_photo"  onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])" >
                                <img class="d-block" class=" mt-3" id="profile" width="150" src="{{asset('uploads/users')}}/{{Auth::user()->photo}}" alt="Please Upload a Photo">
                        @error('profile_photo')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label>Role</label>
                        <input type="number" class="form-control" name="role" maxlength="5" value="{{Auth::user()->role}}">
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
                    </div>
    </div>
</div>
@endsection
