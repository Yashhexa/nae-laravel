@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark fs-4 text-white"><i class="bi bi-list-task"></i> {{ __('Create Task') }}  @if(isset($deal)) for Deal ID: <a href="/deals/{{$deal->id}}">{{$deal->id}}</a> @endif</div>

                    <div class="card-body">
                        @if(isset($deal))
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
                        <form method="POST" action="{{ route('tasks.store', $deal->id) }}">
                        <input type="hidden" name="deal_id" value="{{$deal->id}}" />
                        @else
                        <form method="POST" action="{{ route('tasks.store') }}">
                            <div class="form-group mb-2">
                                <label for="deals">Deal</label>
                                <select name="deal_id" class="form-control">
                                @foreach ($deals as $deal)
                                   <option value="{{$deal->id}}">{{$deal->title}} - ({{$deal['contact']->name}})</option> 
                                @endforeach
                                </select>
                                </div>                            
                            @endif
                            @csrf

                            <div class="form-group mb-2">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>

                            <div class="form-group mb-2">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                            </div>
<div class="row">
<div class="col-md-4">
    <div class="form-group mb-4">
        <label for="status">{{ __('Status') }}</label>
        <select id="status" class="form-control" name="status" required>
            <option value="pending">{{ __('Pending') }}</option>
            <option value="in_progress">{{ __('In Progress') }}</option>
            <option value="completed">{{ __('Completed') }}</option>
        </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="priority">{{ __('Priority') }}</label>
        <select id="priority" class="form-control" name="priority" required>
            <option value="high">{{ __('High Priority') }}</option>
            <option value="medium">{{ __('Medium Priority') }}</option>
            <option value="low">{{ __('Low Priority') }}</option>
            <option value="normal">{{ __('Normal Priority') }}</option>
            <option value="urgent">{{ __('Urgent') }}</option>
        </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="due_date">{{ __('Due Date') }}</label>
        <input id="closing_date" type="date" class="form-control" name="due_date">
    </div></div>
</div>

                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> {{ __('Create') }}</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle-fill"></i> {{ __('Cancel') }}</a>
                        </form>
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
