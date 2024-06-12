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
	<div class="col-md-12"><h1 class="text-success"><i class="bi bi-list-ul"></i> Manage Blog Categories</h1></div>
</div>
@foreach ($categories as $category)
<div class="row mt-3 pb-3 border-bottom">
	<div class="col-md-8">{{$category->name}}</div>
    <div class="col-md-4 text-center btn-group">
        <a href="/blog/categories/edit/{{$category->id}}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a> 
        <a href="/blog/categories/delete/{{$category->id}}" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> Delete</a>
    </div>
        
</div>    
@endforeach
<div class="row p-5"> {{ $categories->links('vendor.pagination.blog') }} </div>
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