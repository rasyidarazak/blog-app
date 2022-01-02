@extends('layouts.main')

@section('title', $post->title)

@section('content')
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">{{ $post->title }}</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
			<li class="breadcrumb-item active">{{ $post->title }}</li>
		</ol>

		<div class="table-responsive">
			<table class="table table-sm table-bordered">
				<tbody>
					<tr>
						<th width="20%" class="bg-light">Title</th>
						<td class="text-start">{{ $post->title }}</td>
					</tr>
					<tr>
						<th class="bg-light">Description</th>
						<td class="text-start">{{ $post->description }}</td>
					</tr>
					<tr>
						<th class="bg-light">Thumbnail</th>
						<td class="text-start">
							@if($post->thumbnail)
							<img src="/img/{{ $post->thumbnail }}" alt="{{ $post->thumbnail }}" width="400px" class="img-thumbnail">
							@else
							<em>- No Image -</em>
							@endif
						</td>
					</tr>
					<tr>
						<th class="bg-light">Slug</th>
						<td class="text-start">{{ $post->slug }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</main>
@endsection