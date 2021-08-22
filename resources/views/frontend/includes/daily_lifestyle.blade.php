<!-- /#daily-lifestyle-section -->
<section id="daily-lifestyle-section" class="daily-lifestyle-section mb-50">
    <div class="container">
        <div class="owl-carousel small-carousel owl-theme">


            @foreach ($latest_blogs as $blog)

                <div class="item">
                    <div class="card horizontal">
                        <div class="card-image latest_blog">
                            <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" alt="blog Photo - {{ $blog->blog_photo }}">
                            <span class="effect"></span>
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <a href="#" class="tag left l-blue mb-10">{{ $blog->RelationWithCategory->category_name }}</a>
                                <a href="{{ url('blog/details') }}/{{ $blog->slug }}" class="sm-name">{{ Str::limit($blog->blog_title, $limit = 30, $end = '....') }}</a>
                            </div>
                            <div class="card-action">
                                <p class="hero left">BY - <a href="#" class="l-blue">{{ $blog->RelationWithUser->username }}</a></p>
                                <ul class="post-mate right"><li><a href="#" class="m-0"><i class="icofont icofont-comment"></i> {{ $blog->comments->count() }}</a></li></ul>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>
<!-- /#daily-lifestyle-section -->
