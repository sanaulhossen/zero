<!-- /#blog-slider-section -->
<section id="blog-slider-section" class="blog-slider-section w100dt mb-50">
    <div class="container">
        <div class="slider">
            <ul class="slides">

                @foreach ($sliders as $slider)
                    <li class="slider-item">
                        <img src="{{ asset('dashbord') }}/image/slider_image/{{ $slider->slider_photo }}" alt="Image">
                        <div class="caption center-align">
                            <a class="tag l-blue w100dt mb-10">{{ $slider->RelationWithCategory->category_name }}</a>
                            <h1 class="card-title mb-30">{{ $slider->slider_title }}</h1>
                            <h5>{!! $slider->slider_description !!}</h5>
                            <a href="single-blog.html" class="custom-btn waves-effect waves-light">READ MORE</a>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</section>
<!-- /#blog-slider-section -->
