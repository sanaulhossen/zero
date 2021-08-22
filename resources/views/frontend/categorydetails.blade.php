@extends('layouts.frontend_app')

@section('category')
  active
@endsection

@section('title')
Category | Zero
@endsection

@section('frontend_content')
<section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
    <div class="container">
        <nav class="breadcrumb-nav w100dt">
            <div class="page-name hide-on-small-only left">
                <h4>{{ strtoupper($category_name) }} - CATEOGRY</h4>
            </div>
            <div class="nav-wrapper right">
                <a href="{{ url('/') }}" class="breadcrumb">Home</a>
                <a class="breadcrumb active">Cateogry</a>
            </div>
        </nav>
    </div>
</section>

<section id="cateogry-section" class="cateogry-section w100dt mb-50">
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8">


                <div class="slider mb-30">
                    <ul class="slides">

                    @foreach ($blog_sliders as $slider)

                        <li class="slider-item">
                            <img src="{{ asset('dashbord/image/blog_image') }}/{{ $slider->blog_photo }}" alt="{{ $slider->blog_photo }}">
                            <div class="caption center-align">
                                <a href="#" class="tag l-blue w100dt mb-20">{{ $slider->RelationWithCategory->category_name }}</a>
                                <h1 class="card-title mb-5">{!! Str::limit($slider->blog_title, $limit = 40, $end = '..') !!}</h1>
                                <p>{!! Str::limit($slider->blog_description, $limit = 50, $end = '....') !!}</p>
                                <a href="{{ url('blog/details') }}/{{ $slider->slug }}" class="custom-btn waves-effect waves-light">READ MORE</a>
                            </div>
                        </li>

                    @endforeach

                    </ul>
                </div>


                <div class="row">

                    @foreach ($blogs as $blog)

                        <div class="col m12 s12">
                            <div class="blogs mb-30">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" alt="blog Photo - {{ $blog->blog_photo }}">
                                    </div>
                                    <div class="card-content w100dt">
                                        <p><a href="#" class="tag left w100dt l-blue mb-30">{{ $blog->RelationWithCategory->category_name }}</a> </p>
                                        <a href="{{ url('blog/details') }}/{{ $slider->slug }}" class="card-title">{{ $blog->blog_title }}</a>
                                        <p class="mb-30">{!! Str::limit($blog->blog_description, $limit = 150, $end = '....') !!}</p>
                                        <ul class="post-mate-time left">
                                            <li><p class="hero left">By - <a href="#" class="l-blue">{{ $blog->RelationWithUser->username }}</a></p></li>
                                            <li><i class="icofont icofont-ui-calendar"></i> {{ $blog->created_at->format('d M y') }}</li>
                                        </ul>

                                        <ul class="post-mate right">
                                            <li class="like"><a href="#"><i class="icofont icofont-heart-alt"></i> 55</a></li>
                                            <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $blog->comments->count() }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

            @include('frontend.includes.sidebar')

        </div>
    </div>
</section>
<!-- ==================== cateogry-section end ==================== -->
@endsection
