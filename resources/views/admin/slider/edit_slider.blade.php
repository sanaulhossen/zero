@extends('layouts.dashbord_app')

@section('main_slider')
  open
@endsection

@section('indexslider')
  active
@endsection

@section('title')
  Slider | Dashbord
@endsection

@section('dashbord_content')

<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ url('/') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <a class="breadcrumb-item" href="{{ route('index.slider') }}">Sliders</a>
            <span class="breadcrumb-item active">Add Slider</span>
        </nav>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 m-auto">
			<div class="card">
				<h3 class="mt-3 text-center">SLIDER EDIT FORM</h5>
				<div class="card-body">

					<form method="post" action="{{ route('update.slider',$slider->id) }}" enctype="multipart/form-data">
						@csrf

                        <div class="form-group">
                            <label> Category Name </label>
                            <select class="form-control" name="category_id">
                                <option value="">-Select One-</option>
                                @foreach($categories as $category)
                                    <option {{ ($category->id == $slider->category_id) ? "selected":"" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
					  	<div class="form-group">
						    <label> Slider Title </label>
						    <input type="text" class="form-control" name="slider_title" value="{{ $slider->slider_title }}" placeholder="Enter Slider Title">
						    @error('slider_title')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
					  	</div>
					  	<div class="form-group">
						    <label> Slider Description </label>
						    <textarea class="form-control" rows="5" name="slider_description" id="slidertext" placeholder="Enter Slider Description">{{ $slider->slider_description }}</textarea>
						    @error('slider_description')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
					  	</div>
					  	<div class="form-group">
						    <label> Slider Photo </label>
						    <input type="file" class="form-control" name="slider_photo">
                            <img src="{{ asset('dashbord/image/slider_image') }}/{{ $slider->slider_photo }}" class="img-fluid" alt="Slider Photo - {{ $slider->slider_photo }}">
						    @error('slider_photo')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
					  	</div>
				  	    <button type="submit" class="btn btn-primary">Update Slider</button>

					</form>

				</div>
		  	</div>
		</div>
	</div>
</div>

@endsection
@section('footer_scripts')
  <script>

    @if(session('success_status'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Slider Updated Successfully.');
    @endif

    ClassicEditor
        .create( document.querySelector( '#slidertext' ) )
        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        });

  </script>
@endsection
