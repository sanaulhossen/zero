@extends('layouts.dashbord_app')

@section('main_category')
  open
@endsection

@section('indexcategory')
  active
@endsection

@section('title')
  Category Edit | Dashbord
@endsection

@section('dashbord_content')

<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ url('/') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <a class="breadcrumb-item" href="{{ route('index.category') }}">Categories</a>
            <span class="breadcrumb-item active">Edit: <strong>{{ $category->category_name }}</strong> Category</span>
        </nav>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 m-auto">
			<div class="card">
				<h3 class="mt-3 text-center">CATEGORY EDIT FORM</h5>
				<div class="card-body">

					<form method="post" action="{{ route('update.category',$category->id) }}" enctype="multipart/form-data">
						@csrf

					  	<div class="form-group">
						    <label> Category Name </label>
						    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" placeholder="Enter Category Name">
						    @error('category_name')
						    	<span class="text-danger">{{ $message }}</span>
						    @enderror
					  	</div>
					  	<div class="form-group">
						    <label> Category Description </label>
						    <textarea class="form-control" rows="5" name="category_description" id="categorytext" placeholder="Enter Category Description">{{ $category->category_description }}</textarea>
						    @error('category_description')
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
        alertify.success('Category Updated Successfully.');
    @endif

    ClassicEditor
        .create( document.querySelector( '#categorytext' ) )
        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        });

  </script>
@endsection
