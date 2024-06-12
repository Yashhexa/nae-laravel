@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3 text-end"> <a href="/tasks/{{ $deal->id }}/create" class="btn btn-danger"><i
                        class="bi bi-list-task"></i> Create a Task</a>  <a href="/notes/{{ $deal->id }}/deal" class="btn btn-success"><i
                            class="bi bi-pen-fill"></i> Create a Note</a></div>
            <div class="col-md-12">

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
                <div class="row mb-2  m-3">
                    <div class="col-md-12">
                        <h2 class="text-success"><i class="bi bi-list-task"></i> Tasks</h2>
                    </div>
                </div>
                <div class="row mb-1  text-center me-2 ms-2">
                    <div class="col-md-1 p-2">Priority</div>
                    <div class="col-md-3 p-2">Status</div>
                    <div class="col-md-3 p-2">Title</div>
                    <div class="col-md-3 p-2">Due Date</div>
                    <div class="col-md-2 p-2">

                    </div>
                </div>
                
                @foreach ($tasks as $task)
                @php
                $style = "bg-light";
                switch ($task->priority) {
                        case "high":
                        $style = "text-bg-danger";
                            break;
                        case "medium":
                        $style = "text-bg-warning";
                            break;
                        case "low":
                        $style = "text-bg-success";
                            break;
                        case "normal":
                        $style = "text-bg-primary";
                            break;
                        case "urgent":
                        $style = "text-bg-info";
                            break;                                                        
                        }                    
                  @endphp                
                    <div class="row mb-1 rows-data-grey text-center me-2 ms-2">
                        <div class="col-md-1 p-2 {{$style}}">{{ $task->priority }}</div>
                        <div class="col-md-3 p-2">{{$task->status}}</div>
                        <div class="col-md-3 p-2 bg-light">{{$task->title}}</div>
                        <div class="col-md-3 p-2"> {{ date('F j, Y', strtotime($task->due_date)) }}
                        </div>
                        <div class="col-md-2 p-2 bg-light">

                            <a href="/tasks/{{$task->id}}/edit" data-bs-toggle="tooltip"
                                data-bs-title="Edit Task" class="btn btn-sm btn-primary"><i
                                    class="bi bi-pencil-square"></i> </a>
                            <a href="/tasks/{{$task->id}}" data-bs-toggle="tooltip"
                                data-bs-title="View Task" class="btn btn-sm btn-success"><i class="bi bi-view-list"></i>
                            </a>
                            <form action="/tasks/{{$task->id}}" method="POST" style="display: inline;">@csrf
                                <input type="hidden" autocomplete="off"> <input type="hidden" name="_method" value="DELETE"> <button
                                    type="submit" data-bs-toggle="tooltip" data-bs-title="Delete Task"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this task?')"><i
                                        class="bi bi-trash"></i> </button>
                            </form>

                        </div>
                    </div>
                @endforeach
                <hr />
                <div class="row mb-2  m-3">
                    <div class="col-md-12">
                        <h2 class="text-success"><i class="bi bi-pen-fill"></i> Notes</h2>
                    </div>
                </div>
@foreach ($notes as $note)
<div class="row rows-data-grey mb-1 me-2 ms-2">
    <div class="col-md-2 p-2 bg-light">{{date("F j, Y, g:i a", strtotime($note->created_at))}}</div>
    <div class="col-md-8 p-2">{{$note->title}}</div>
    <div class="col-md-2 bg-light text-center p-2">
        <a href="/notes/{{$note->id}}/edit" data-bs-toggle="tooltip"
            data-bs-title="Edit note" class="btn btn-sm btn-primary"><i
                class="bi bi-pencil-square"></i> </a>
        <a href="/notes/{{$note->id}}" data-bs-toggle="tooltip"
            data-bs-title="View note" class="btn btn-sm btn-success"><i class="bi bi-view-list"></i>
        </a>
        <form action="/notes/{{$note->id}}" method="POST" style="display: inline;">@csrf
            <input type="hidden" autocomplete="off"> <input type="hidden" name="_method" value="DELETE"> <button
                type="submit" data-bs-toggle="tooltip" data-bs-title="Delete Task"
                class="btn btn-sm btn-danger"
                onclick="return confirm('Are you sure you want to delete this note?')"><i
                    class="bi bi-trash"></i> </button>
        </form>

    </div>
</div>    
@endforeach
            </div>
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
@endsection
