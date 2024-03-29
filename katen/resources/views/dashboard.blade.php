@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Welcome to the Dashboard <span class="text-primary">{{Auth::user()->name}}</span></h1>
    </div>
</div>
@endsection
