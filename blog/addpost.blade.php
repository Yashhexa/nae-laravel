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
<div class="row mt-3"><h1 class="text-success"><i class="bi bi-substack"></i> Add new post.</h1></div>
	{!! Form::open(['route' => 'blog.save', 'files' => true]) !!}
@csrf
		<div class="mb-3">
			{{ Form::label('category_id', 'Category', ['class'=>'form-label']) }}
		<select name="category_id" class="form-control" required>
			<option value="">Select one</option>
			@foreach($categories as $k=>$v)
			<option value="{{$v->id}}">{{$v->name}}</option>
			@endforeach
		</select>

		</div>
		<div class="mb-3">
			{{ Form::label('title', 'Title', ['class'=>'form-label']) }}
			{{ Form::text('title', null, array('class' => 'form-control', 'maxlength'=>150)) }}
		</div>        
		<div class="mb-3">
			{{ Form::label('summary', 'Summary', ['class'=>'form-label']) }}
			{{ Form::textarea('summary', null, array('class' => 'form-control', 'rows'=>4)) }}
		</div>
        <div class="mb-3">
            <textarea id="summernote" name="content" rows="6"></textarea>
        </div>
		<div class="mb-3">
			<div>
				<label for="formFileLg" class="form-label">Post Image (optional)</label>
				<input class="form-control form-control-lg" id="image" name="image" type="file">
			  </div>
		</div>
		<div class="mb-3">
			{{ Form::label('url', 'URL Key', ['class'=>'form-label']) }}
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-link-45deg"></i></span>
                <input type="text" class="form-control" name="url" placeholder="URL Key" aria-label="url" aria-describedby="basic-addon1">
              </div>
		</div>


		{{ Form::submit('Add Post', array('class' => 'btn btn-primary btn-lg')) }}

	{{ Form::close() }}

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