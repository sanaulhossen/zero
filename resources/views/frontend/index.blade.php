@extends('layouts.frontend_app')

@section('home')
  active
@endsection

@section('title')
Home | Zero
@endsection

@section('frontend_content')

    <!-- ==================== blog-slider-section start ==================== -->
    @include('frontend.includes.blog_slider')
    <!-- ==================== blog-slider-section end ==================== -->



    <!-- ==================== daily-lifestyle-section Start ==================== -->
    @include('frontend.includes.daily_lifestyle')
    <!-- ==================== daily-lifestyle-section End ==================== -->



    <!-- ==================== blog-section start ==================== -->
    @include('frontend.includes.blog_section')
    <!-- ==================== blog-section end ==================== -->


@endsection
