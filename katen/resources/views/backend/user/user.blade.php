@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                  <h3>User's list</h3>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success mb-3">{{session('delete')}}</div>
                    @endif
                    <table id="users" class="display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $sl=>$user )

                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if ($user->role == 0)
                                        <div class="badge bg-primary">Visitor</div>
                                        @elseif ($user->role == 2)
                                        <div class="badge bg-success">Super Admin</div>
                                        @elseif ($user->role == 3)
                                        <div class="badge bg-warning">Admin</div>
                                        @elseif ($user->role == 4)
                                        <div class="badge bg-danger">Moderator</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->photo ==  null)
                                    <img src="{{asset('backend_asset')}}/images/users/avatar-4.jpg" alt="user-image" width="50" >
                                    @else
                                    <img src="{{asset('uploads/users')}}/{{$user->photo}}" width="50" alt="user-image" >
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.edit' ,$user->id )}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <a href="{{route('user.delete' ,$user->id )}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
                    <h3>Add Users</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success mb-3">{{session('success')}}</div>
                    @endif
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                                <div class="alert alert-danger mt-2 text-capitalize">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
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
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        let table = new DataTable('#users');
    </script>
@endsection
