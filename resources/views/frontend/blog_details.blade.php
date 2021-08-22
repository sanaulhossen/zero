@extends('layouts.frontend_app')

@section('title')
Blog Details | Zero
@endsection

@section('frontend_content')

<section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
    <div class="container">
        <nav class="breadcrumb-nav w100dt">
            <div class="page-name hide-on-small-only left">
                <h4>SINGLE BLOG</h4>
            </div>
            <div class="nav-wrapper right">
                <a href="{{ url('/') }}" class="breadcrumb">Home</a>
                <a class="breadcrumb active">Blog Single</a>
            </div>
        </nav>
    </div>
</section>
<!-- ==================== single-blog-section start ====================-->
<section id="single-blog-section" class="single-blog-section w100dt mb-50">
    <div class="container">
        <div class="row">

            <div class="col m8 s12">

                <div class="blogs mb-30">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog_info->blog_photo }}" alt="{{ $blog_info->blog_photo }}">
                        </div>
                        <!-- /.card-image -->
                        <div class="card-content w100dt">
                            <p><a href="#" class="tag left w100dt l-blue mb-30">{{ $blog_info->RelationWithCategory->category_name }}</a></p>
                            <a class="card-title mb-30">{{ $blog_info->blog_title }}</a>
                            {{-- <p class="mb-30">{!! $blog_info->blog_description !!}</p> --}}
                            <ul class="post-mate-time left mb-30">
                                <li><p class="hero left">By - <a href="#" class="l-blue">{{ $blog_info->RelationWithUser->username }}</a></p></li>
                                <li><i class="icofont icofont-ui-calendar"></i> {{ $blog_info->created_at->format('d M y') }}</li>
                            </ul>

                            <ul class="post-mate right mb-30">
                                <li class="like"><a href="#"><i class="icofont icofont-heart-alt"></i> 55</a></li>
                                <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $blog_info->comments->count() }}</a></li>
                            </ul>

                            <p class="w100dt mb-10">{!! $blog_info->blog_description !!}</p>

                            <ul class="tag-list left">
                                @foreach ($blog_info->tags as $item)
                                    <li><a href="#!" class="waves-effect">#{{ $item->name }}</a></li>
                                @endforeach
                            </ul>

                            <ul class="share-links right">
                                <li><a href="#" class="facebook"><i class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="icofont icofont-social-twitter"></i></a></li>
                                <li><a href="#" class="google-plus"><i class="icofont icofont-social-google-plus"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="icofont icofont-brand-linkedin"></i></a></li>
                                <li><a href="#" class="pinterest"><i class="icofont icofont-social-pinterest"></i></a></li>
                                <li><a href="#" class="instagram"><i class="icofont icofont-social-instagram"></i></a></li>
                            </ul>

                        </div>
                        <!-- /.card-content -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.blogs -->

                <div class="prv-nxt-post w100dt mb-30">
                    <div class="row">

                        <div class="col m6 s12">
                            <div class="sb-prv-post">
                                <div class="pn-img left">
                                    <a href="{{ url('blog/next/details') }}/{{ $blog_info->id-1 }}" class="prv-nxt-btn l-blue"><i class="icofont icofont-caret-left"></i> Preveious</a>
                                </div>
                            </div>
                            <!-- /.sb-prv-post -->
                        </div>
                        <!-- colm6 -->

                        <div class="col m6 s12">
                            <div class="sb-nxt-post">
                                <div class="pn-img right">
                                    <a href="{{ url('blog/next/details') }}/{{ $blog_info->id+1 }}" class="prv-nxt-btn l-blue">Next <i class="icofont icofont-caret-right"></i></a>
                                </div>
                            </div>
                            <!-- /.sb-nxt-post -->
                        </div>
                        <!-- colm6 -->

                    </div>
                    <!-- row -->
                </div>

                <div class="peoples-comments w100dt mb-30">
                    <div class="sidebar-title center-align">
                        <h2>{{ $blog_info->comments->count() }} Comments</h2>
                    </div>

                    @foreach ($blog_info->comments as $item)

                        <div class="comment-area w100dt">

                            <div class="comment w100dt mb-30">
                                <div class="ppic left">
                                    <img src="{{ asset('dashbord/image/user_image') }}/{{ $item->user->image }}" alt="Image">
                                </div>
                                <div class="pname">
                                    <h4 class="mb-10"><a href="#" class="card-title l-blue">{{ $item->user->name }}</a></h4>
                                    <p class="comment-text mb-10">{{ $item->comment }}</p>
                                    <ul class="post-mate-time left">
                                        <li><i class="icofont icofont-ui-calendar"></i> {{ $item->created_at->format('d M y - h:i A') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="leave-comment">

                    <div class="sidebar-title center-align">
                        <h2>Leave Your Comment</h2>
                    </div>

                    @guest
                        <h4 class="p-5">Please, <a href="{{ url('login') }}">Login</a> for your valuable comment..</h4>
                    @else
                        <form class="comment-area w100dt" action="{{ route('store.comment', $blog_info->id) }}" method="POST">
                        @csrf

                            <div class="row">
                                <div class="col s12">
                                    <div class="form-item">
                                        <textarea id="textarea1" name="comment" class="materialize-textarea"></textarea>
                                        <label for="textarea1">Textarea</label>
                                        @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="custom-btn waves-effect waves-light right">SUBMIT NOW</button>

                        </form>
                    @endguest


                </div>
                <!-- /.leave-comment -->

            </div>

            @include('frontend.includes.blog_sidebar')
        </div>
    </div>
</section>
<!-- /#single-blog-section -->
<!-- ==================== single-blog-section end ====================-->
@endsection

