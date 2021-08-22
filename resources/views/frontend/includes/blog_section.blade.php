<!-- /#blog-section -->
<section id="blog-section" class="blog-section w100dt mb-50">
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8">

                @foreach ($latest_blogs as $blog)
                    <div class="blogs mb-30">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" alt="{{ $blog->blog_photo }}">
                            </div>
                            <div class="card-content w100dt">
                                <p><a href="#" class="tag left w100dt l-blue mb-30">{{ $blog->RelationWithCategory->category_name }}</a></p>
                                <a href="{{ url('blog/details') }}/{{ $blog->slug }}" class="card-title">{{ $blog->blog_title }}</a>
                                <p class="mb-30">{!! Str::limit($blog->blog_description, $limit = 150, $end = '....') !!}</p>
                                <ul class="post-mate-time left">
                                    <li><p class="hero left">By - <a href="#" class="l-blue">{{ $blog->RelationWithUser->username }}</a></p></li>
                                    <li><i class="icofont icofont-ui-calendar"></i>{{ $blog->created_at->format('d M y') }}</li>
                                </ul>
                                <ul class="post-mate right">
                                    <li class="like"><a href="#"><i class="icofont icofont-heart-alt"></i> 55</a></li>
                                    <li class="comment"><a href="#"><i class="icofont icofont-comment"></i> {{ $blog->comments->count() }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $latest_blogs->links() }}
            </div>
            @include('frontend.includes.sidebar')
        </div>
    </div>
</section>
<!-- /#blog-section -->
