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
<div class="row mt-3"><h1 class="text-success"><i class="bi bi-node-plus-fill"></i> Add new category</h1></div>
	{!! Form::open(['route' => 'categories.store', 'files' => true]) !!}

		<div class="mb-3">
			{{ Form::label('name', 'Name', ['class'=>'form-label']) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('parent_id', 'Parent Category', ['class'=>'form-label']) }}
		<select name="parent_id" class="form-control">
			<option value="0">Select one</option>
			@foreach($categories as $k=>$v)
			<option value="{{$v->id}}">{{$v->name}}</option>
			@endforeach
		</select>

		</div>
		<div class="mb-3">
			{{ Form::label('description', 'Description', ['class'=>'form-label']) }}
			{{ Form::textarea('description', null, array('class' => 'form-control', 'rows'=>6)) }}
		</div>
		<div class="mb-3">
			<div>
				<label for="formFileLg" class="form-label">Category Image (optional)</label>
				<input class="form-control form-control-lg" id="image_url" name="image" type="file">
			  </div>
		</div>
		<div class="mb-3">
			{{ Form::label('sort', 'Sort Order', ['class'=>'form-label']) }}
			{{ Form::text('sort', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Add Category', array('class' => 'btn btn-primary btn-lg')) }}

	{{ Form::close() }}

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@stop