@extends('layouts.dashbord_app')

@section('title')
  Profile | Dashbord
@endsection

@section('dashbord_content')

<div class="page-header">
    <h2 class="header-title">Profile</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ url('home') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <span class="breadcrumb-item active">Profile</span>
        </nav>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-md-flex align-items-center">
                        <div class="text-center text-sm-left ">
                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                <img src="{{ asset('dashbord') }}/image/user_image/{{ Auth::user()->image }}" alt="{{ Auth::user()->image }}">
                            </div>
                        </div>
                        <div class="text-center text-sm-left m-v-15 p-l-30">
                            <h2 class="m-b-5">{{ Auth::user()->name }}</h2>
                            <p class="text-opacity font-size-13">{{ Auth::user()->username }}</p>
                            <p class="text-dark m-b-20">{{ Auth::user()->profession }}</p>
                            <button class="btn btn-primary btn-tone">Contact</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="d-md-block d-none border-left col-1"></div>
                        <div class="col">
                            <ul class="list-unstyled m-t-10">
                                <li class="row">
                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                        <span>Email: </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{ Auth::user()->email }}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                        <span>Phone: </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{ Auth::user()->phone }}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                        <span>Location: </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{ Auth::user()->address }}</p>
                                </li>
                            </ul>
                            <div class="d-flex font-size-22 m-t-15">
                                <a href="" class="text-gray p-r-20">
                                    <i class="anticon anticon-facebook"></i>
                                </a>
                                <a href="" class="text-gray p-r-20">
                                    <i class="anticon anticon-twitter"></i>
                                </a>
                                <a href="" class="text-gray p-r-20">
                                    <i class="anticon anticon-behance"></i>
                                </a>
                                <a href="" class="text-gray p-r-20">
                                    <i class="anticon anticon-dribbble"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mt-3 text-center">COMMENT DATA</h3>
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Comment</th>
                                <th>Blog</th>
                                <th>Create At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comments as $comment)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        <a href="{{ url('blog/details') }}/{{ $comment->blog->slug }}">{{ $comment->blog->blog_title }}</a>
                                    </td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="dropdown dropdown-animated scale-left">
                                                <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="anticon anticon-ellipsis"></i>
                                                </a>
                                            <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-152px, -83px, 0px);">

                                                <a href="{{ route('delete.comment',$comment->id) }}" class="dropdown-item">
                                                    <i class="anticon anticon-delete"></i>
                                                    <span class="m-l-10">Delete</span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger">No Data Availabke</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
