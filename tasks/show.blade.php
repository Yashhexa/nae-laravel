@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark fs-4 text-white"><i class="bi bi-list-task"></i> {{ __('Task Details') }}</div>

                    <div class="card-body">
                        <div class="bg-warning p-3 border border-bottom-0 border-warning rounded-top">
                            <div class="row">
                                <div class="col-md-12">Deal name: <b>{{$deal->title}}</b></div>
                                <div class="col-md-12">Description: <b>{{$deal->description}}</b></div>
                                <div class="col-md-3">Amount: <b>${{number_format($deal->amount,2)}}</b></div>
                                <div class="col-md-3">Created on: <b>{{date("F j, Y, g:i a",strtotime($deal->created_at))}}</b></div>
                                <div class="col-md-3">Status: <b>{{$deal->status}}</b></div>
                                <div class="col-md-3">Closing date: <b>{{date("F j, Y",strtotime($deal->closing_date))}}</b></div>                               
                            </div>
                        </div>  
                        <div class="bg-warning-subtle p-3 border border-top-0 border-warning rounded-bottom mb-3">
                            <div class="row">
                                <div class="col-md-6"><i class="bi bi-person-fill"></i> Contact name: <b><a href="/contacts/{{$deal['contact']->id}}">{{$deal['contact']->name}}</a></b></div>
                                <div class="col-md-6"><i class="bi bi-buildings-fill"></i> Company: <b><a href="/companies/{{$company->id}}">{{$company->name}}</a></b></div>
                                <div class="col-md-6"><i class="bi bi-envelope-fill"></i> Email: <b><a href="mailto:{{$deal['contact']->email}}">{{$deal['contact']->email}}</a></b></div>
                                <div class="col-md-6"><i class="bi bi-telephone-fill"></i> Phone: <b><a href="tel:{{$deal['contact']->phone}}">{{$deal['contact']->phone}}</a></b></div>
                                
                             
                            </div>
                        </div>                         
                        <p><strong>Title:</strong> {{ $task->title }}</p>
                        <p><strong>Description:</strong> {{ $task->description ?: 'N/A' }}</p>
                        <p><strong>Status: </strong><span class="badge text-bg-info"> {{ ucfirst($task->status) }}</span></p>
                        <p><strong>Due date:</strong> {{ date("F j, Y",strtotime($task->due_date)) }}</p><hr />
                        <a href="/tasks/{{ $task->id }}/edit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> {{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>    
@endsection
