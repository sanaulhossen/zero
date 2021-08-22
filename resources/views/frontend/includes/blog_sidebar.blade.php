<div class="col s12 m4 l4">

    @include('frontend.includes.admin_info')
    <!-- /.sidebar-testimonial -->


    <div class="sidebar-followme w100dt mb-30">
        <div class="sidebar-title center-align">
            <h2>Follow Me</h2>
        </div>
        <!-- /.sidebar-title -->

        <ul class="followme-links w100dt">
            <li class="mrb15">
                <a href="#" class="facebook">
                    <i class="icofont icofont-social-facebook"></i>
                    <small class="Followers white-text">105 Likes</small>
                </a>
            </li>
            <li class="mrb15">
                <a href="#" class="twitter">
                    <i class="icofont icofont-social-twitter"></i>
                    <small class="Followers white-text">50 Follows</small>
                </a>
            </li>
            <li>
                <a href="#" class="google-plus">
                    <i class="icofont icofont-social-google-plus"></i>
                    <small class="Followers white-text">39 Follows</small>
                </a>
            </li>

            <li class="mrb15">
                <a href="#" class="linkedin">
                    <i class="icofont icofont-brand-linkedin"></i>
                    <small class="Followers white-text">50 Follows</small>
                </a>
            </li>
            <li class="mrb15">
                <a href="#" class="pinterest">
                    <i class="icofont icofont-social-pinterest"></i>
                    <small class="Followers white-text">50 Follows</small>
                </a>
            </li>
            <li>
                <a href="#" class="instagram">
                    <i class="icofont icofont-social-instagram"></i>
                    <small class="Followers white-text">39 Likes</small>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.sidebar-followme -->


    <div class="featured-posts w100dt mb-30">
        <div class="sidebar-title center-align">
            <h2>Related Posts</h2>
        </div>
        <!-- /.sidebar-title -->

        <div class="sidebar-posts">

            @foreach ($related_blogs as $blog)
                <div class="card">
                    <div class="card-image mb-10">
                        <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" alt="{{ $blog->blog_photo }}">
                        <span class="effect"></span>
                    </div>
                    <div class="card-content w100dt">
                        <p><a href="#" class="tag left w100dt l-blue mb-10">{{ $blog->RelationWithCategory->category_name }}</a></p>
                        <a href="{{ url('blog/details') }}/{{ $blog->slug }}" class="card-title">{{ $blog->blog_title }}</a>
                        <ul class="post-mate-time left">
                            <li><p class="hero left">By - <a href="#" class="l-blue">{{ $blog->RelationWithUser->username }}</a></p></li>
                        </ul>
                        <ul class="post-mate right">
                            <li class="like"><a href="#"><i class="icofont icofont-heart-alt"></i> 55</a></li>
                            <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $blog->comments->count() }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- /.featured-posts -->


    <div class="top-post w100dt mb-30">
        <div class="sidebar-title center-align">
            <h2>Top Posts</h2>
        </div>
        <!-- /.sidebar-title -->

        <ul id="tabs-swipe-demo" class="top-post-tab tabs tabs-fixed-width">
            <li class="tab"><a href="#test-swipe-1" class="active">Most Views</a></li>
            <li class="tab"><a href="#test-swipe-2">Recent</a></li>
            <li class="tab"><a href="#test-swipe-3">Comments</a></li>
        </ul>

        <div id="test-swipe-1" class="tab-contant most-view">
            <div class="sidebar-posts">

                @foreach ($top_views as $view)

                    <div class="hot-post w100dt mb-10">
                        <div class="blogdetails_sidebar hot-post-image">
                            <img src="{{ asset('dashbord/image/blog_image') }}/{{ $view->blog_photo }}" alt="{{ $view->blog_photo }}">
                            <span class="effect"></span>
                        </div>
                        <!-- /.hot-post-image -->
                        <div class="hot-post-stacked">
                            <p><a href="#" class="tag left w100dt l-blue mb-10">{{ $view->RelationWithCategory->category_name }}</a></p>
                            <a href="{{ url('blog/details') }}/{{ $view->slug }}" class="blogdetails_sidebar_title card-title">{{ $view->blog_title }}</a>
                            <div class="hot-post-action">
                                <p class="hero left"> BY - <a href="#" class="l-blue">{{ $view->RelationWithUser->username }}</a></p>
                                <ul class="post-mate right">
                                    <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $view->comments->count() }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <!-- /.most-view -->


        <div id="test-swipe-2" class="tab-contant recent-post">


            @foreach ($recent as $blog)

                <div class="hot-post w100dt p-15">
                    <div class="blogdetails_sidebar hot-post-image">
                        <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" alt="{{ $blog->blog_photo }}">
                        <span class="effect"></span>
                    </div>
                    <div class="hot-post-stacked">
                        <p><a href="#" class="tag left w100dt l-blue mb-10">{{ $blog->RelationWithCategory->category_name }}</a></p>
                        <a href="{{ url('blog/details') }}/{{ $blog->slug }}" class="blogdetails_sidebar_title card-title">{{ $blog->blog_title }}</a>
                        <div class="hot-post-action">
                            <p class="hero left"> BY - <a href="#" class="l-blue">{{ $blog->RelationWithUser->username }}</a></p>
                            <ul class="post-mate right">
                                <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $blog->comments->count() }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <!-- /.recent-post -->


        <div id="test-swipe-3" class="tab-contant Comments-post">

            @foreach ($comments as $comment)

                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s3">
                            {{ $comment->user->name }}
                        </div>
                        <div class="col s9">
                            <span class="black-text">
                                - {{ $comment->comment }}
                            </span>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <!-- /.tab-contant -->
    </div>
    <!-- /.top-post -->


    @include('frontend.includes.subscribe')
    <!-- /.sidebar-subscribe -->

</div>
