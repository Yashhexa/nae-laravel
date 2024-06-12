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
	<div class="col-md-12"><h1 class="text-success"><i class="bi bi-list-ul"></i> Add Blog Category</h1></div>
<form action="{{ route('add_cat') }}" method="post" class="form mt-5 needs-validation" novalidate>
                    @csrf

		<div class="mb-3">
		<label>Category Name</label>
			<input type="text" name="name" class="form-control" required/>
		</div>        



	<button class="btn btn-primary btn-lg mt-4" type="submit">Add Category</button>

</form>
</div>
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