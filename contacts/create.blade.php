@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white fs-4"><i class="bi bi-person-lines-fill"></i> {{ __('Create Contact') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="company_id">{{ __('Company') }}</label>
                            <select id="company_id" class="form-control" name="company_id" disabled>
                                <option value="" selected disabled>Select a company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($company->id == $id) selected @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div><input type="hidden" name="company_id" value="{{$id}}" />

                        <button type="submit" class="btn btn-primary"><i class="bi bi-person-lines-fill"></i> {{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@endsection
