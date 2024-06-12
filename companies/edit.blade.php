@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white fs-4"><i class="bi bi-buildings"></i> Edit Company</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.update', $company->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3 text-center mb-3">
                                    @if ($company->logo)
                                        <div>
                                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                                style="max-width: 100px; max-height: 50px;"> 
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-file"> Company Logo
                                        <input type="file"
                                            class="form-control custom-file-input @error('logo') is-invalid @enderror"
                                            id="logo" name="logo">

                                    </div>
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">Company Name
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $company->name) }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">Website
                                        <input id="website" type="text"
                                            class="form-control @error('website') is-invalid @enderror" name="website"
                                            value="{{ old('website', $company->website) }}">
                                        @error('website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


  <div class="row">                 
                        <div class="col-md-12 mb-3"> <div class="form-group">Street
                            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror"
                                name="street" value="{{ old('street', $company->street) }}" required>
                            @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 mb-3"><div class="form-group">City
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                            name="city" value="{{ old('city', $company->city) }}" required>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

               
                    <div class="col-md-4 mb-3"> <div class="form-group">State
                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                            name="state" value="{{ old('state', $company->state) }}" required>
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

               
                    <div class="col-md-4 mb-3"> <div class="form-group">Zip
                        <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror"
                            name="zip" value="{{ old('zip', $company->zip) }}" required>
                        @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
  </div>                   
                   

<div class="row">
    <div class="col-md-6"> <div class="form-group">Phone
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
            name="phone" value="{{ old('phone', $company->phone) }}">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



    <div class="col-md-6 mb-3">  <div class="form-group">Email
        <input id="email" type="email"
            class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email', $company->email) }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>

                    
                        <div class="col-md-6 offset-md-4"><div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-floppy"></i> Update
                            </button>
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancel</a>
                        </div>
                    </div>
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
