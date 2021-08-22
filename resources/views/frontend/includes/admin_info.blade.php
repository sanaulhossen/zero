<div class="sidebar-testimonial mb-30">
    <div class="sidebar-title center-align">
        <h2>Admin</h2>
    </div>

    <div class="carousel carousel-slider center initialized" data-indicators="true" style="height: 340px;">

        @foreach ($admin as $item)

            <div class="carousel-item active" style="z-index: 0; opacity: 1; display: block; transform: translateX(0px) translateX(0px) translateX(0px) translateZ(0px);">
                <div class="item-img">
                    <img src="{{ asset('dashbord/image/user_image/default.png') }}" alt="Image">
                </div>
                <h2>{{ $item->name }}</h2>
                <small>{{ $item->email }}</small>
                <p>Sedut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque.</p>
            </div>

        @endforeach

    </div>
</div>
