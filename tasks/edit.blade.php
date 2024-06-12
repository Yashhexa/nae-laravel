@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark fs-4 text-white"><i class="bi bi-list-task"></i> {{ __('Edit Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $task->title) }}" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description">{{ old('description', $task->description) }}</textarea>
                            </div>

                            <div class="row mb-4 mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <select id="status" class="form-control" name="status" required>
                                            <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                            <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>{{ __('In Progress') }}</option>
                                            <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="priority">{{ __('Priority') }}</label>
                                        <select id="priority" class="form-control" name="priority" required>
                                            <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>{{ __('High Priority') }}</option>
                                            <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>{{ __('Medium Priority') }}</option>
                                            <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>{{ __('Low Priority') }}</option>
                                            <option value="normal" {{ $task->priority === 'normal' ? 'selected' : '' }}>{{ __('Normal Priority') }}</option>
                                            <option value="urgent" {{ $task->priority === 'urgent' ? 'selected' : '' }}>{{ __('Urgent') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="due_date">{{ __('Due Date') }}</label>
                                        <input id="closing_date" value="{{ $task->due_date }}" type="date" class="form-control" name="due_date">
                                    </div></div>
                                </div>

                            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> {{ __('Update') }}</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> {{ __('Cancel') }}</a>
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
