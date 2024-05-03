@extends('layouts.admin')

@section('content')
<table id="noti" class="display">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Report</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notifications as $sl=>$notification )

        <tr>
            <td>{{$sl+1}}</td>
            <td>{{$notification->name}}</td>
            <td>{{$notification->email}}</td>
            <td>{{$notification->website}}</td>
            <td>{{$notification->description}}</td>
            <td>
                @if ($notification->status == 0)
                <a class="btn btn-info">Unread</a>
                @else
                <a class="btn btn-secondary">Read</a>
                @endif
            </td>
            <td>

                @if ($notification->comment_status == 0)

                <a href="{{route('comment.status' ,$notification->id )}}" class="btn btn-danger" title="Report">
                    Report as Bad Comment
                </a>
                @else
                <a href="{{route('comment.status' ,$notification->id )}}" class="btn btn-success" title="Active">
                    Active as Good Comment
                </a>
                @endif
            </td>
            <td>
                <a href="{{route('notification.view' ,$notification->id )}}" class="btn btn-info" title="View">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection



@section('footer_script')
    <script>
        let table = new DataTable('#noti');
    </script>
@endsection
