@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ isset($company) ? 'Edit Company' : 'Add New Company' }}</h1>
        <form action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}" method="POST">
            @csrf
            @isset($company)
                @method('PUT')
            @endisset
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($company) ? $company->name : '') }}">
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($company) ? $company->website : '') }}">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($company) ? $company->address : '') }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($company) ? $company->phone : '') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($company) ? $company->email : '') }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($company) ? 'Update' : 'Create' }}</button>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
