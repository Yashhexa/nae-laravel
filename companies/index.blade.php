@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <div class="row mb-2 border-bottom">
            <div class="col-md-10">
                <h1 class="fw-light text-success"><i class="bi bi-buildings"></i> Companies</h1>
            </div>
            <div class="col-md-2"><a href="/companies/create" class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Add new company</a></div>
        </div>
        @foreach ($companies as $company)
            <div class="row mb-1 rows-data text-center">
                <div class="col-md-1 p-2 bg-light"><img src="/storage/{{ $company->logo }}" style="max-height: 30px;"
                        class="img-fluid" /></div>
                <div class="col-md-3 p-2">{{ $company->name }}</div>
                <div class="col-md-3 p-2 bg-light"><i class="bi bi-envelope"></i> <a href="mailto:{{ $company->email }}"> {{ $company->email }}</a></div>
                <div class="col-md-3 p-2"><i class="bi bi-telephone"></i> <a href="tel:{{ $company->phone }}"> {{ $company->phone }}</a></div>
                <div class="col-md-2 p-2 bg-light">

                    <a href="{{ route('companies.edit', $company) }}" data-bs-toggle="tooltip" data-bs-title="Edit Company" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> </a>
                    <a href="{{ route('companies.show', $company) }}"  data-bs-toggle="tooltip" data-bs-title="View Company" class="btn btn-sm btn-success"><i class="bi bi-view-list"></i> </a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-bs-toggle="tooltip" data-bs-title="Delete Company"  class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this company?')"><i class="bi bi-trash"></i> </button>
                    </form>

                </div>
            </div>
        @endforeach

        <div class="row mt-3">
            {{ $companies->links('vendor.pagination.plain') }}
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
