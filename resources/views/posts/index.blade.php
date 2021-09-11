@extends('template')

@section('title', 'All Posts')

@section('content')
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Posts</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<a class="btn btn-sm btn-outline-success mx-2" href="{{ route('posts.create') }}"><span data-feather="plus"></span> Create Post</a>
				{{-- <div class="btn-group me-2">
					<a class="btn btn-sm btn-outline-secondary" href="#">Import</a>
					<a class="btn btn-sm btn-outline-secondary" href="#">Export</a>
				</div> --}}
			</div>
		</div>

	  	@if ($message = Session::get('success'))
	  	<div class="row text-center">
	  		<div class="col-md-4">
	  			<div class="alert alert-success">
					<span>{{ $message }}</span>
				</div>
	  		</div>
	  	</div>
		@endif

		<div class="table-responsive">
			<table class="table table-bordered table-sm table-hover">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>Title</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td class="text-center">{{ ++$i }}</td>
					<td>{{ $post->title }}</td>
					<td class="text-center">
						<a class="btn btn-outline-success btn-sm my-1" href="{{ route('posts.show',$post->slug) }}"><span data-feather="eye"></span> View</a>
						<a class="btn btn-outline-primary btn-sm my-1" href="{{ route('posts.edit',$post->slug) }}"><span data-feather="edit"></span></a>
						<button type="submit" class="btn btn-outline-danger btn-sm my-1 delete-post delete-post-button" data-bs-toggle="modal" data-bs-target="#deletePostModal-{{ $post->slug }}"><span data-feather="trash-2"></span></button>
					</td>
				</tr>

				<!-- Delete Post Modal -->
		        <div class="modal fade" id="deletePostModal-{{ $post->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		          <div class="modal-dialog modal-dialog-centered">
		            <div class="modal-content">
		              <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		              </div>
		              <div class="modal-body">
		                <p>Post <strong>{{ $post->title }}</strong> will delete permanently.</p>
		              </div>
		              <div class="modal-footer">
		                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
		                    @csrf
		                    @method('DELETE')
		                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                    <button type="submit" class="btn btn-danger">Delete</button>
		                </form>
		              </div>
		            </div>
		          </div>
		        </div>

				@endforeach
			</tbody>
			</table>
		</div>

		{!! $posts->links() !!}
	</main>
@endsection