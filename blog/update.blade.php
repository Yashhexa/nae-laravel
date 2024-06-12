@extends('layouts.admin')

@section('content')
<div class="container">
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif
<div class="row mt-3">
	<div class="col-md-8"><h1 class="text-success"><i class="bi bi-substack"></i> Edit: <span class="text-primary">{{$post->title}}</span></h1></div>
	<div class="col-md-4"><a href="/blog/delete/{{$post->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete Post</a>
</div>
<form action="{{ route('updatepost', [$post->id]) }}" method="post" enctype="multipart/form-data"
                    class="form mt-5 needs-validation" novalidate>
                    @csrf
		<div class="mb-3">
            <input type="hidden" name="old_image" value="{{$post->image}}" />
            <input type="hidden" name="post_id" value="{{$post->id}}" />
	<label>Category</label>
		<select name="category_id" class="form-control" required>
			<option value="">Select one</option>
			@foreach($categories as $k=>$v)
			@if ($v->id == $post->category_id)
            <option value="{{$v->id}}" selected>{{$v->name}}</option>
            @else
            <option value="{{$v->id}}">{{$v->name}}</option>
            @endif
			@endforeach
		</select>

		</div>
		<div class="mb-3">
		<label>Title</label>
			<input type="text" name="title" value="{{$post->title}}" class="form-control" />
		</div>        
		<div class="mb-3">
		<label>Summary</label>
			<textarea name="summary" class="form-control" rows="4">{{$post->summary}}</textarea>
		</div>
        <div class="mb-3">
            <textarea id="summernote" name="content" rows="6">{{$post->content}}</textarea>
        </div>
		<div class="mb-3">
            <div class="row">
                <div class="col-md-10">
                    <label for="formFileLg" class="form-label">Post Image (optional)</label>
                    <input class="form-control form-control-lg" id="image" name="image" type="file">
                  </div>
                  <div class="col-md-2 text-center"><small class="text-info">Current image</small><br /><img src="{{$post->image}}" class="img-fluid img-thumbnail" /></div>
            </div>
		</div>
		<div class="mb-3">
			<label>URL Key</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-link-45deg"></i></span>
                <input type="text" class="form-control" value="{{$post->url}}" name="url" placeholder="URL Key" aria-label="url" aria-describedby="basic-addon1">
              </div>
		</div>
<hr />

	<button class="btn btn-primary btn-lg" type="submit">Update Post</button>

</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js'></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote({
        placeholder: 'Content here...',
        tabsize: 2,
        height: 200
      });
});
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@stop