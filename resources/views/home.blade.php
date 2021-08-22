@extends('layouts.dashbord_app')

@section('home')
  active
@endsection

@section('title')
  Zero | Dashbord
@endsection

@section('dashbord_content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="card p-3">
                <div class="card-body p-4">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <img src="{{ asset('dashbord') }}/assets/images/avatars/thumb-3.jpg"  alt="">
                        </div>
                        <div class="m-l-15">
                            <h4 class="m-b-0">Welcome back, <strong>{{ Auth::user()->name }}</strong></h4>
                            <span class="text-gray"><strong>Profession</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">OUR ADMIN</h5>
                        <div>
                            <a href="" class="btn btn-tone btn-sm">View All</a>
                        </div>
                    </div>
                    <div class="m-t-15">
                        <div class="avatar-string m-l-5">

                            {{-- @foreach ($admins as $admin)
                                <a href="javascript:void(0);" data-toggle="tooltip" title="" data-original-title="{{ $admin->name }}">
                                    <div class="avatar avatar-image team-member">
                                        <img src="{{ asset('dashbord') }}/image/profile_photo/{{ $admin->profile_photo }}" alt="{{ $admin->profile_photo }}">
                                    </div>
                                </a>
                            @endforeach --}}

                            <a href="javascript:void(0);" data-toggle="tooltip" title="" data-original-title="Add Member">
                                <div class="avatar avatar-icon avatar-blue team-member">
                                    <i class="anticon anticon-plus font-size-22"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

