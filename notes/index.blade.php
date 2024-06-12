@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
<h1>Notes</h1>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<ul class="list-group">
    @foreach ($notes as $note)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('notes.edit', $note) }}">{{ $note->title }}</a>
            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this note?')">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('notes.create') }}" class="btn btn-primary">Create New Note</a>
    </div></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@endsection