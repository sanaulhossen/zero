@extends('layouts.dashbord_app')

@section('main_blog')
  open
@endsection

@section('indexblog')
  active
@endsection

@section('title')
  Blog | Dashbord
@endsection

@section('dashbord_content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ url('/') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <a class="breadcrumb-item" href="{{ route('index.blog') }}">Blog</a>
            <a class="breadcrumb-item active" href="{{ route('add.blog') }}">Add Blog</a>
        </nav>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<h3 class="mt-3 text-center">BLOG DATA</h3>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="category_table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Title</th>
                                    <th>Create By</th>
                                    <th>Image</th>
                                    <th>Feature</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $blog->RelationWithCategory->category_name }}</td>
                                        <td class="tag" style="width: 120px">
                                            <div>
                                                @foreach ($blog->tags as $item)
                                                    <li>{{ $item->name }}</li>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($blog->blog_title, $limit = 20, $end = '....') }}</td>
                                        <td>{{ $blog->RelationWithUser->name }}</td>
                                        <td>
                                            <div class="avatar avatar-image" style="min-width: 40px">
                                                <img src="{{ asset('dashbord/image/blog_image') }}/{{ $blog->blog_photo }}" alt="blog Photo - {{ $blog->blog_photo }}">
                                            </div>
                                        </td>
                                        <td>
                                            @if ( $blog->status == 1 )
                                                <a href="{{ route('active.blog',$blog->id) }}" class="btn btn-tone btn-info"><i class="anticon anticon-check-circle"></i></a>
                                            @elseif ( $blog->status == 2 )
                                                <a href="{{ route('deactive.blog',$blog->id) }}" class="btn btn-tone btn-warning"><i class="anticon anticon-close-circle"></i></a>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="dropdown dropdown-animated scale-left">
                                                    <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="anticon anticon-ellipsis"></i>
                                                    </a>
                                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-152px, -83px, 0px);">

                                                    <a href="{{ route('edit.blog',$blog->id) }}" class="dropdown-item">
                                                        <i class="far fa-edit"></i>
                                                        <span class="m-l-10">Edit</span>
                                                    </a>

                                                    <a href="{{ route('delete.blog',$blog->id) }}" class="dropdown-item">
                                                        <i class="anticon anticon-delete"></i>
                                                        <span class="m-l-10">Delete</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $blogs->links() }}
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
        alertify.success('Blog Data Deleted.');
    @endif

    @if(session('activeblog'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Feature Blog Data Set.');
    @endif

    @if(session('deactiveblog'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Feature Blog Data Unset.');
    @endif

  </script>
@endsection
