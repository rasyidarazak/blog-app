@extends('layouts.main')

@section('title', 'Edit | '.$post->title)

@section('content')
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">{{ $post->title }} - Edit</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
			<li class="breadcrumb-item active">Edit</li>
		</ol>

		<form action="{{ route('posts.update',$post->slug) }}" method="POST" enctype="multipart/form-data">
		    @csrf
		    @method('PUT')
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				    <div class="form-group mb-3">
				        <label class="form-label">Title</label>
				        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') ?? $post->title }}">
				        @error('title')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
				    <div class="form-group mb-3">
				        <label class="form-label">Description</label>
				        <textarea class="form-control @error('description') is-invalid @enderror" style="height:250px" name="description" placeholder="Description">{{ old('description') ?? $post->description }}</textarea>
				        @error('description')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
				        <label class="form-label">Thumbnail</label>
				        <div class="row">
				        	<div class="col-md-12">
				        		@if($post->thumbnail)
						        <img src="/img/{{ old('thumbnail') ?? $post->thumbnail }}" alt="{{ old('thumbnail') ?? $post->thumbnail }}" width="400px" class="img-thumbnail mb-2">
						        @else
						        <p><em>- No Image -</em></p>
						        @endif
						        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="thumbnail">
						        @error('thumbnail')
						        <div class="invalid-feedback">
					            	{{ $message }}
					          	</div>
					          	@enderror
				        	</div>
			            </div>
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
				        <label class="form-label">Slug</label>
				        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug') ?? $post->slug }}">
				        @error('slug')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
				    <button type="submit" class="btn btn-primary">Submit Post</button>
				</div>
			</div>
		</form>
	</div>
</main>
@endsection