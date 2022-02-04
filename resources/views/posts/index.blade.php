@extends('layouts.main')

@if(isset($category))
	@section('title', "Category: $category->name")
	@section('description', 'Show posts with specific category.')
@elseif(isset($tag))
	@section('title', "Tag: $tag->name")
	@section('description', 'Show posts with specific tag.')
@else
	@section('title', 'All Posts')
	@section('description', 'Manipulation of post data on this page.')
@endif

@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-sm btn-success mb-3 text-center">Create a Post</a>

@if ($message = Session::get('success'))
<div class="row text-center">
	<div class="col-md-4">
		<div class="alert alert-success">
			<span>{{ $message }}</span>
		</div>
	</div>
</div>
@endif

<div class="card shadow mb-4">
	<div class="card-header py-3">
		@if(isset($category))
			<h6 class="m-0 font-weight-bold text-primary">Posts Table - <i class="fas fa-sm fa-fw fa-tag"></i> {{ $category->name }} Category</h6>
		@elseif(isset($tag))
			<h6 class="m-0 font-weight-bold text-primary">Posts Table - #{{ $tag->name }} Tag</h6>
		@else
			<h6 class="m-0 font-weight-bold text-primary">Posts Table</h6>
		@endif
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Title</th>
						<th width="15%">Category</th>
						<th width="15%">Tags</th>
						<th width="20%">Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Category</th>
						<th>Tags</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
				@if ($posts->count())
					@foreach ($posts as $index => $post)
						<tr>
							<td>{{ ++$index }}</td>
							<td>{{ $post->title }}</td>
							<td><a href="/posts/categories/{{ $post->category->slug }}"><i class="fas fa-sm fa-fw fa-tag"></i> {{ $post->category->name }}</a></td>
							<td>
								@foreach ($post->tags as $tag)
						        	<a class="small badge badge-primary" href="/posts/tags/{{ $tag->slug }}">#{{ $tag->name }}</a>
						        @endforeach
							</td>
							<td>
								<a class="btn btn-outline-success btn-sm my-1" href="{{ route('posts.show',$post->slug) }}"><i class="fas fa-eye"></i></a>
								<a class="btn btn-outline-primary btn-sm my-1" href="{{ route('posts.edit',$post->slug) }}"><i class="fas fa-edit"></i></a>
								<button type="button" class="btn btn-outline-danger btn-sm my-1" data-toggle="modal" data-target="#deletePostModal-{{ $post->slug }}"><i class="fas fa-trash"></i></button>
							</td>
						</tr>

						<!-- Delete Post Modal -->
						<div class="modal fade" id="deletePostModal-{{ $post->slug }}" tabindex="-1" aria-labelledby="deletePostModal" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="deletePostModal">Are you sure to delete it?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Post <strong>{{ $post->title }}</strong> will delete permanently.</p>
									</div>
									<div class="modal-footer">
										<form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection