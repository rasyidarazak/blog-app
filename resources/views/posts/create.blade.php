@extends('layouts.main')

@section('title', 'Create a Post')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Create Form</h6>
	</div>
	<div class="card-body">
		<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
		    @csrf
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				    <div class="form-group mb-3">
				        <label class="form-label">Title*</label>
				        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title.." value="{{ old('title') }}">
				        @error('title')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
				    <div class="form-group mb-3">
				        <label class="form-label">Description*</label>
				        <textarea class="form-control @error('description') is-invalid @enderror" style="height:250px" id="description" name="description" placeholder="Tell about your post..">{{ old('description') }}</textarea>
				        @error('description')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
				        <label class="form-label">Category*</label>
						<select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
							<option disabled {{ (old('category_id') ? '':'selected') }}>-- Choose a Category --</option>
							@foreach($categories as $category) 
								<option value="{{ $category->id }}" {{ (old('category_id') == $category->id ? 'selected':'') }}>{{ $category->name }}</option>
							@endforeach
						</select>
				        @error('category_id')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
				        <label class="form-label">Tags*</label>
						<select class="form-control @error('tags') is-invalid @enderror select2" id="tags" name="tags[]" multiple>
							@foreach($tags as $tag)
								<option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}>{{ $tag->name }}</option>
							@endforeach
						</select>
						@error('tags')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
				        <label class="form-label">Slug*</label>
				        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Create a slug.." value="{{ old('slug') }}">
				        @error('slug')
				        <div class="invalid-feedback">
			            	{{ $message }}
			          	</div>
			          	@enderror
				    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group mb-3">
						<label class="form-label">Thumbnail*</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
							<label class="custom-file-label" for="thumbnail">Choose file</label>
							@error('thumbnail')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
				    </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
				    <button type="submit" class="btn btn-primary">Submit Post</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection