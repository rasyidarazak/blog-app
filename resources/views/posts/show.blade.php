@extends('layouts.main')

@section('title', $post->title)

@section('content')
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
		<h6 class="m-0 font-weight-bold text-primary">Detail Post</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-bordered">
				<tbody>
					<tr>
						<th width="20%" class="bg-light">Title</th>
						<td class="text-left">{{ $post->title }}</td>
					</tr>
					<tr>
						<th class="bg-light">Description</th>
						<td class="text-left">{{ $post->description }}</td>
					</tr>
					<tr>
						<th class="bg-light">Category</th>
						<td class="text-left"><a href="/posts/categories/{{ $post->category->slug }}"><i class="fas fa-sm fa-fw fa-tag"></i> {{ $post->category->name }}</a></td>
					</tr>
					<tr>
						<th class="bg-light">Tags</th>
						<td class="text-left">
							@foreach ($post->tags as $tag)
								<a class="small badge badge-primary" href="/posts/tags/{{ $tag->slug }}">#{{ $tag->name }}</a>
							@endforeach
						</td>
					</tr>
					<tr>
						<th class="bg-light">Thumbnail</th>
						<td class="text-left">
							@if($post->thumbnail)
							<img src="/img/{{ $post->thumbnail }}" alt="{{ $post->thumbnail }}" width="35%" class="img-thumbnail">
							@else
							<em>- No Image -</em>
							@endif
						</td>
					</tr>
					<tr>
						<th class="bg-light">Slug</th>
						<td class="text-left">{{ $post->slug }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection