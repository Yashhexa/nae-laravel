@extends('layouts.calendar')

@section('content')
<style>
    table.lightgrey-weekends tbody td:nth-child(n+6) {
      background-color: #f3f3f3;
    }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-end"><a href="{{ route('tasks.create') }}" class="btn btn-warning mb-3"><i class="bi bi-list-task"></i> {{ __('Create New Task') }}</a></div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark bg-gradient fs-4 text-white"><i class="bi bi-list-task"></i> Tasks</div>

                    <div class="card-body">
                        <div id="calendar" class="mb-3"></div>                        

                        @if ($tasks->isEmpty())
                            <p>{{ __('No tasks found.') }}</p>
                        @else
                            <div class="row">
                                @foreach ($tasks as $task)
                                    <div class="col-md-6 mb-3">
                                        <div class="card"> <div class="card-header bg-success bg-gradient fs-5 text-white"><i class="bi bi-bell"></i> {{ $task->title }}</div>
                                            <div class="card-body">
                                                <p class="card-text">{{ substr($task->description,0,100) }}...</p>
                                                <p class="card-text"><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
                                                <p class="card-text"><strong>Due date:</strong> {{date("F j, Y",strtotime($task->due_date))}} 
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-dark">{{ __('Edit') }}</a>
                                                    </div>
                                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete this task?') }}')">{{ __('Delete') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                {{ $tasks->links('vendor.pagination.plain') }}
            </div>       
        </div>
    </div>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        <script>
            $(document).ready(function () {
              $("#calendar").zabuto_calendar({
                events: [
        @foreach ($tasks as $task)
        @php
        $markup = "";
                        switch ($task->priority) {
                                case "high":
                                $style = "bg-danger bg-gradient";
                                $link = "link-light text-decoration-none";
                                break;
                                case "medium":
                                $style = "bg-warning bg-gradient";
                                $link = "link-dark text-decoration-none";
                                break;
                                case "low":
                                $style = "bg-success bg-gradient";
                                $link = "link-light text-decoration-none";
                                break;
                                case "normal":
                                $style = "bg-primary bg-gradient";
                                $link = "link-light text-decoration-none";
                                break;
                                case "urgent":
                                $style = "bg-info bg-gradient";
                                $link = "link-dark text-decoration-none";
                                break;                                                        
                                } 
                    foreach($cal[$task->due_date] as $k=>$v){
                        foreach($v as $title){
                            $markup .= "<a href='/tasks/".$task->id."' class='".$link."'><hr />".$title."</a>";
                        }
                    }                                                   
        @endphp 
        {
                "date": "{{$task->due_date}}",
                "markup": "<h3 class='{{$link}}'>[day]</h3>{!!$markup!!}",
                "classname": "{{$style}}"
        }, 
        @endforeach
            ],   
            month: {{$month}},      
            classname: 'table table-bordered lightgrey-weekends',
            show_days: true,
            navigation_markup: {
                prev: '<i class="bi bi-arrow-left-circle-fill fs-5"></i>',
                next: '<i class="bi bi-arrow-right-circle-fill fs-5"></i>'
              }        
              });
            });
            </script>  
@endsection
