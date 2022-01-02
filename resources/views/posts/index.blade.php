@extends('layouts.main')

@section('title', 'All Posts')

@section('content')
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">Posts</h1>

		@if ($message = Session::get('success'))
		<div class="row text-center">
			<div class="col-md-4">
				<div class="alert alert-success">
					<span>{{ $message }}</span>
				</div>
			</div>
		</div>
		@endif

		<div class="card mb-4">
			<div class="card-body">
				This page contains features to create, read, update, & delete posts. Please be careful when manipulating data.
			</div>
		</div>

		<a href="{{ route('posts.create') }}" class="btn btn-sm btn-success mb-3 text-center">Create a Post</a>

		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
				Posts Table
			</div>
			<div class="card-body">
				<table id="datatablesSimple">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th class="text-start">Title</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th class="text-start">Title</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					@foreach ($posts as $index => $post)
					<tr>
						<td>{{ ++$index }}</td>
						<td class="text-start">{{ $post->title }}</td>
						<td>
							<a class="btn btn-outline-success btn-sm my-1" href="{{ route('posts.show',$post->slug) }}"><i class="fas fa-eye"></i> View</a>
							<a class="btn btn-outline-primary btn-sm my-1" href="{{ route('posts.edit',$post->slug) }}"><i class="fas fa-edit"></i></a>
							<button type="submit" class="btn btn-outline-danger btn-sm my-1 delete-post delete-post-button" data-bs-toggle="modal" data-bs-target="#deletePostModal-{{ $post->slug }}"><i class="fas fa-trash"></i></button>
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
		</div>
	</div>
</main>
@endsection