@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Sub Menu List</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success mb-3">{{session('success')}}</div>
                @endif
                @if (session('delete'))
                <div class="alert alert-success mb-3">{{session('delete')}}</div>
                @endif
                <div class="row">
                    @foreach ($menus as $menu)
                    <div class="col-lg-6">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h3 class="text-capitalize text-warning">{{$menu->name}}</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Sub Menu Name</th>
                                        <th>Sub Menu Link</th>
                                        <th>Action</th>
                                    </tr>


                                    @forelse (App\Models\Submenu::where('menu_id', $menu->id)->get() as $sub_menu )
                                    <tr>
                                        <td class="text-capitalize">{{$sub_menu->name}}</td>
                                        <td>{{$sub_menu->link}}</td>

                                        <td>
                                            {{-- <a href="{{route('user.edit' ,$user->id )}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a> --}}
                                            <a href="{{route('submenu.delete' ,$sub_menu->id )}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center "><h4 class="text-info">No Sub Menu Available</h4></td>
                                    </tr>
                                    @endforelse



                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Sub Menu</h3>
            </div>
            <div class="card-body">
                <form action="{{route('submenu.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Main Menu Name</label>
                        <select name="menu_id" class="form-control" id="">
                            <option value="">Select Main Menu</option>
                            @foreach ($menus as $menu)
                            <option class="text-capitalize" value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                        @error('menu_id')
                        <div class="alert alert-danger mt-3 text-capitalize">{{$message}}</div>
                        @enderror
                    </div>
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
                    <button type="submit" class="btn btn-primary">Add Sub Menu</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer_script')
<script>
    let table = new DataTable('#submenus');

</script>
@endsection
