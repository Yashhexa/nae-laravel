@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark fs-4 text-white"><i class="bi bi-pen-fill"></i> {{ __('Make a Note') }}  @if(isset($deal)) for Deal ID: <a href="/deals/{{$deal->id}}">{{$deal->id}}</a> @endif</div>

                <div class="card-body">

<form action="{{ route('notes.store') }}" method="POST">
    @csrf
     
    <div class="form-group mb-3">
        <label for="deal_id">Deal</label>
<select name="deal_id" class="form-control" required>
    <option value="">Select a deal</option>
@foreach ($deals as $deal)
    <option value="{{$deal->id}}">{{$deal->title}} - ({{$deal['contact']->name}})</option>
@endforeach
</select>
@error('deal_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>


    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="4" class="form-control">{{ old('content') }}</textarea>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary"><i class="bi bi-pen-fill"></i> Save Note</button>
</form>
                </div></div></div>
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