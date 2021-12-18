@extends('layouts.main')

@section('title', $post->title)

@section('content')
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h3>{{ $post->title }}</h3>
			<a class="btn btn-sm btn-outline-secondary mx-2" href="{{ route('posts.index') }}"><span data-feather="arrow-left"></span> Back</a>
		</div>
		 
		<div class="table-responsive">
			<table class="table table-sm table-bordered">
				<tbody>
					<tr>
						<th width="20%" class="bg-light">Title</th>
						<td>{{ $post->title }}</td>
					</tr>
					<tr>
						<th class="bg-light">Description</th>
						<td>{{ $post->description }}</td>
					</tr>
					<tr>
						<th class="bg-light">Thumbnail</th>
						<td>
							@if($post->thumbnail)
							<img src="/img/{{ $post->thumbnail }}" alt="{{ $post->thumbnail }}" width="400px" class="img-thumbnail">
							@else
							<em>- No Image -</em>
							@endif
						</td>
					</tr>
					<tr>
						<th class="bg-light">Slug</th>
						<td>{{ $post->slug }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</main>
@endsection