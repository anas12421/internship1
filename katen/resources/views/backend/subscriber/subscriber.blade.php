@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Subscriber's List</h3>
                </div>
                <div class="card-body">
                    <table id="subs" class="display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $sl=>$subs )

                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$subs->email}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        let table = new DataTable('#subs');
    </script>
@endsection



