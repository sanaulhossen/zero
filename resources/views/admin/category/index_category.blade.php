@extends('layouts.dashbord_app')

@section('main_category')
  open
@endsection

@section('indexcategory')
  active
@endsection

@section('title')
  Category | Dashbord
@endsection

@section('dashbord_content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ url('/') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <a class="breadcrumb-item" href="{{ route('index.category') }}">Category</a>
            <a class="breadcrumb-item active" href="{{ route('add.category') }}">Add Category</a>
        </nav>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<h3 class="mt-3 text-center">CATEGORY DATA</h3>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="category_table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Create By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{!! $category->category_description !!}</td>
                                        <td>{{ $category->RelationWithUser->name }}</td>
                                        <td>
                                            <div class="dropdown dropdown-animated scale-left">
                                                    <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="anticon anticon-ellipsis"></i>
                                                    </a>
                                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-152px, -83px, 0px);">

                                                    <a href="{{ route('edit.category',$category->id) }}" class="dropdown-item">
                                                        <i class="far fa-edit"></i>
                                                        <span class="m-l-10">Edit</span>
                                                    </a>

                                                    <a href="{{ route('delete.category',$category->id) }}" class="dropdown-item">
                                                        <i class="anticon anticon-delete"></i>
                                                        <span class="m-l-10">Delete</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-danger">No Data Availabke</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
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
        alertify.success('Category Data Deleted.');
    @endif

  </script>
@endsection
