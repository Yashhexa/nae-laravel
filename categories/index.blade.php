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
<div class="row mt-3"><h1 class="text-success"><i class="bi bi-list-stars"></i> Categories</h1></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Order</th>
				<th>name</th>


				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)

				<tr>
					<td>{{ $category->sort }}</td>
					<td>{{ $category->name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('categories.edit', [$category->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>
	{{ $categories->links('vendor.pagination.bootstrap-5') }}
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
