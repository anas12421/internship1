@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Update Users</h3>
                </div>
                <div class="card-body">
                    @if (session('update'))
                        <div class="alert alert-success mb-3">{{session('update')}}</div>
                    @endif
                    <form action="{{route('user.update' , $user->id)}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-2 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                             @error('email')
                                <div class="alert alert-danger mt-2 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="">
                             @error('password')
                                <div class="alert alert-danger mt-2 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="">
                             @error('password_confirmation')
                                <div class="alert alert-danger mt-2 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" class="form-control" id="">
                                <option value="">Select Role</option>
                                @if ($user->role == 0)
                                <option selected value="0">Visitor</option>
                                <option  value="2">Super Admin</option>
                                <option  value="3">Admin</option>
                                <option  value="4">Moderator</option>

                                @elseif ($user->role == 2)
                                <option  value="0">Visitor</option>
                                <option selected value="2">Super Admin</option>
                                <option  value="3">Admin</option>
                                <option  value="4">Moderator</option>

                                @elseif ($user->role == 3)
                                <option  value="0">Visitor</option>
                                <option  value="2">Super Admin</option>
                                <option selected value="3">Admin</option>
                                <option  value="4">Moderator</option>

                                @elseif ($user->role == 4)
                                <option  value="0">Visitor</option>
                                <option  value="2">Super Admin</option>
                                <option  value="3">Admin</option>
                                <option selected value="4">Moderator</option>
                                @endif
                            </select>
                             @error('role')
                                <div class="alert alert-danger mt-2 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
