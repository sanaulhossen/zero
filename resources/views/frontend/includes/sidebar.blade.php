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
            <h2>Featured Posts</h2>
        </div>
        <div class="sidebar-posts">

            @foreach ($feature_blogs as $item)
                <div class="card">
                    <div class="card-image mb-10">
                        <img src="{{ asset('dashbord/image/blog_image') }}/{{ $item->blog_photo }}" alt="{{ $item->blog_photo }}">
                        <span class="effect"></span>
                    </div>
                    <div class="card-content w100dt">
                        <p><a href="#" class="tag left w100dt l-blue mb-10">{{ $item->RelationWithCategory->category_name }}</a></p>
                        <a href="{{ url('blog/details') }}/{{ $item->slug }}" class="card-title">{{ $item->blog_title }}</a>
                        <ul class="post-mate-time left">
                            <li><p class="hero left">By - <a href="#" class="l-blue">{{ $item->RelationWithUser->username }}</a></p></li>
                        </ul>
                        <ul class="post-mate right">
                            <li class="like"><a href="#"><i class="icofont icofont-heart-alt"></i> 55</a></li>
                            <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $item->comments->count() }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- /.featured-posts -->


    <div class="featured-posts w100dt mb-30">
        <div class="sidebar-title center-align">
            <h2>Top View Posts</h2>
        </div>
        <div class="sidebar-posts">

            @foreach ($top_views as $view)
                <div class="card">
                    <div class="card-image mb-10">
                        <img src="{{ asset('dashbord/image/blog_image') }}/{{ $view->blog_photo }}" alt="{{ $view->blog_photo }}">
                        <span class="effect"></span>
                    </div>
                    <div class="card-content w100dt">
                        <p><a href="#" class="tag left w100dt l-blue mb-10">{{ $view->RelationWithCategory->category_name }}</a></p>
                        <a href="{{ url('blog/details') }}/{{ $view->slug }}" class="card-title">{{ $view->blog_title }}</a>
                        <ul class="post-mate-time left">
                            <li><p class="hero left">By - <a href="#" class="l-blue">{{ $view->RelationWithUser->username }}</a></p></li>
                        </ul>

                        <ul class="post-mate right">
                            <li class="like"><a href="#"><i class="icofont icofont-heart-alt"></i> 55</a></li>
                            <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $view->comments->count() }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    @include('frontend.includes.subscribe')
    <!-- /.sidebar-subscribe -->

</div>
