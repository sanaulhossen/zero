@extends('layouts.dashbord_app')

@section('main_blog')
  open
@endsection

@section('indexblog')
  active
@endsection

@section('title')
  Blog Edit | Dashbord
@endsection

@section('dashbord_content')

<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ url('/') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <a class="breadcrumb-item" href="{{ route('index.blog') }}">Blog</a>
            <span class="breadcrumb-item active">Edit: <strong>{{ $blog->blog_title }}</strong> Blog Title</span>
        </nav>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 m-auto">
			<div class="card">
				<h3 class="mt-3 text-center">BLOG EDIT FORM</h5>
				<div class="card-body">

					<form method="post" action="{{ route('update.blog',$blog->id) }}" enctype="multipart/form-data">
						@csrf

					  	<div class="form-group">
                            <label> Blog Category </label>
                            <select class="form-control" name="category_id">
                                <option value="">-Select One-</option>
                                @foreach($categories as $category)
                                    <option {{ ($category->id == $blog->category_id) ? "selected":"" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
					  	<div class="form-group">
						    <label> Blog Title </label>
						    <input type="text" class="form-control" name="blog_title" value="{{ $blog->blog_title }}">
						    @error('blog_title')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
					  	</div>
					  	<div class="form-group">
						    <label> Blog Description </label>
						    <textarea class="form-control" rows="5" name="blog_description" id="summernote">{{ $blog->blog_description }}</textarea>
						    @error('blog_description')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
					  	</div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="blog_photo">
                            <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" class="img-fluid" alt="blog Photo - {{ $blog->blog_photo }}">
                            @error('blog_photo')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
                        </div>
				  	    <button type="submit" class="btn btn-primary">Update Category</button>

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
        alertify.success('Blog Updated Successfully.');
    @endif

    $('#summernote').summernote({
        height: 200
    });

  </script>
@endsection
