@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header bg-dark fs-4 text-white"><i class="bi bi-cash-coin"></i> {{ __('Deal Details') }}
                    <span class="float-end"> Deal Created: <span class="text-warning">{{date("F j, Y, g:i a", strtotime($deal->created_at))}}</span></span></div>
            
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Title:</strong> {{ $deal->title }}</p>
                            <p><strong>User:</strong> {{ $deal->user->name }}</p>
                            <p><strong>Contact:</strong> <a href="/contacts/{{ $deal->contact->id }}">
                                    {{ $deal->contact->name }}</a></p>
            
                        </div>
                        <div class="col-md-6">
                            <p><strong>Amount:</strong> ${{ number_format($deal->amount,2) }}</p>
                            <p><strong>Status:</strong> {{ $deal->status }}</p>
                            <p><strong>Closing Date:</strong>
                                {{ date('F j, Y, g:i a', strtotime($deal->closing_date)) }}</p>
                        </div>
                    </div>
                    <p><strong>Description:</strong> {{ $deal->description }}</p>
                    <a href="{{ route('deals.index') }}" class="btn btn-secondary">{{ __('Back to deals') }}</a>
                </div>
            </div> 
            </div>          
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark fs-4 text-white"><i class="bi bi-pen-fill"></i> {{ __('Make a Note') }}  @if(isset($deal)) for Deal ID: <a href="/deals/{{$deal->id}}">{{$deal->id}}</a> @endif</div>

                <div class="card-body">

<form action="{{ route('notes.store') }}" method="POST">
    @csrf
<input type="hidden" name="deal_id" value="{{$deal->id}}" />
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