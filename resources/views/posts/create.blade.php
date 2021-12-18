@extends('layouts.main')

@section('title', 'Create')

@section('content')
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Create Post</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<a class="btn btn-sm btn-outline-secondary mx-2" href="{{ route('posts.index') }}"><span data-feather="arrow-left"></span> Back</a>
			</div>
		</div>
		 
		<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
		    @csrf
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				    <div class="form-group mb-3">
				        <label class="form-label">Title</label>
				        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
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
				        <textarea class="form-control @error('description') is-invalid @enderror" style="height:250px" name="description" placeholder="Description">{{ old('description') }}</textarea>
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
				        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="thumbnail">
				        @error('thumbnail')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
				        <label class="form-label">Slug</label>
				        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug') }}">
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
	</main>
@endsection