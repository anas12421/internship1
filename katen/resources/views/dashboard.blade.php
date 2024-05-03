@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Welcome to the Dashboard <span class="text-primary">{{Auth::user()->name}}</span></h1>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h3>Annual Info</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge badge-soft-primary float-end">Annual</span>
                                <h5 class="card-title mb-0">Total Uploaded Blogs</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="fa-solid fa-upload fs-5"></i> {{$total_blogs->count()}}
                                    </h2>
                                </div>
                                {{-- <div class="col-4 text-end">
                                    <span class="text-muted">12.5% <i
                                            class="mdi mdi-arrow-up text-success"></i></span>
                                </div> --}}
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge badge-soft-primary float-end">Annual</span>
                                <h5 class="card-title mb-0">Total User's</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="fa-solid fa-user fs-5"></i> {{$total_users->count()}}
                                    </h2>
                                </div>
                                {{-- <div class="col-4 text-end">
                                    <span class="text-muted">{{$total_users->count()}} <i
                                            class="mdi mdi-arrow-down text-danger"></i></span>
                                </div> --}}
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge badge-soft-primary float-end">Annual</span>
                                <h5 class="card-title mb-0">Total Subscriber's</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="fa-solid fa-users fs-5"></i> {{$total_subs->count()}}
                                    </h2>
                                </div>
                                {{-- <div class="col-4 text-end">
                                    <span class="text-muted">{{$total_users->count()}} <i
                                            class="mdi mdi-arrow-down text-danger"></i></span>
                                </div> --}}
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">

    <div class="card mt-5">
        <div class="card-header">
            <h3>Daily Info</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge badge-soft-primary float-end">Daily</span>
                                <h5 class="card-title mb-0">Total Uploaded Blogs</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="fa-solid fa-upload fs-5"></i> {{$today_blogs->count()}}
                                    </h2>
                                </div>
                                {{-- <div class="col-4 text-end">
                                    <span class="text-muted">12.5% <i
                                            class="mdi mdi-arrow-up text-success"></i></span>
                                </div> --}}
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge badge-soft-primary float-end">Daily</span>
                                <h5 class="card-title mb-0">Total User's</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="fa-solid fa-user fs-5"></i> {{$today_users->count()}}
                                    </h2>
                                </div>
                                {{-- <div class="col-4 text-end">
                                    <span class="text-muted">{{$total_users->count()}} <i
                                            class="mdi mdi-arrow-down text-danger"></i></span>
                                </div> --}}
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge badge-soft-primary float-end">Daily</span>
                                <h5 class="card-title mb-0">Total Subscriber's</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="fa-solid fa-users fs-5"></i> {{$today_subs->count()}}
                                    </h2>
                                </div>
                                {{-- <div class="col-4 text-end">
                                    <span class="text-muted">{{$total_users->count()}} <i
                                            class="mdi mdi-arrow-down text-danger"></i></span>
                                </div> --}}
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
