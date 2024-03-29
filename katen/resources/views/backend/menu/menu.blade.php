@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Menu List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success mb-3">{{session('success')}}</div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-success mb-3">{{session('delete')}}</div>
                    @endif
                    <table id="menus" class="display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Menu Name</th>
                                <th>Menu Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $sl=>$menu )

                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->link}}</td>
                                <td>
                                    <a href="{{route('user.edit' ,$menu->id )}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <a href="{{route('menu.delete' ,$menu->id )}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
                        <h3>Add Menu</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('menu.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Menu Name</label>
                                <input type="text" name="name" class="form-control" id="">
                                @error('name')
                                    <div class="alert alert-danger mt-3 text-capitalize">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Menu Link</label>
                                <input type="text" name="link" class="form-control" id="">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Menu</button>
                        </form>
                    </div>
                </div>
            </div>

    </div>
@endsection

@section('footer_script')
    <script>
        let table = new DataTable('#menus');
    </script>
@endsection

