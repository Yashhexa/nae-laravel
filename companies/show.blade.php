@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                @if ($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                        style="max-width: 200px; max-height:120px;">
                @else
                    N/A
                @endif
            </div>
            <div class="col-md-6 text-end mb-3">
                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-outline-success"><i
                        class="bi bi-pencil-square"></i> Edit Company</a>
                <a href="{{ route('companies.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i>
                    Add a Company</a>
                    <a href="/contacts/create/{{$company->id}}" class="btn btn-outline-secondary"><i class="bi bi-person-lines-fill"></i>
                        Add a Contact</a>                    
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white fs-3 fw-light"><i class="bi bi-buildings-fill"></i> Company Details <span class="float-end"> Company Added: <span class="text-warning">{{date("F j, Y, g:i a", strtotime($company->created_at))}}</span></span></div>

                    <div class="card-body">
                        <div class="row">

                            <iframe class="border mb-3"
                                src="https://www.google.com/maps?q={{ $company->street }} {{ $company->city }} {{ $company->state }} {{ $company->zip }}&output=embed"
                                width="100%" height="250px"></iframe>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="text-success fw-light border-bottom pb-3"><i class="bi bi-person-circle"></i>
                                    Company Contacts</h2>
                                @foreach ($contacts as $contact)
                                    <div class="border-bottom p-2 rows-data mb-2">
                                        <a href="/contacts/{{ $contact->id }}" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"  data-bs-title="View Contact"><i class="bi bi-search"></i></a>
                                             <a href="/deals/create/contact/{{ $contact->id }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip"  data-bs-title="Create a Deal"><i class="bi bi-cash-coin"></i></a> 
  
                                             <b>{{ $contact->name }}</b> </div>
                                @endforeach

                            </div>
                            <div class="col-md-6 mt-3">
                                <p><strong><i class="bi bi-buildings"></i> Name:</strong> {{ $company->name }}</p>
                                <p><strong><i class="bi bi-link-45deg"></i> Website:</strong> <a
                                        href="{{ $company->website }}" target="_blank"> {{ $company->website ?: 'N/A' }}
                                    </a></p>
                                <p><strong><i class="bi bi-pin-map"></i> Address:</strong> {{ $company->street }},
                                    {{ $company->city }}, {{ $company->state }}, {{ $company->zip }}</p>
                                <p><strong><i class="bi bi-telephone"></i> Phone:</strong><a
                                        href="tel:{{ $company->phone }}" target="_blank">
                                        {{ $company->phone ?: 'N/A' }}</a></p>
                                <p><strong><i class="bi bi-envelope"></i> Email:</strong> <a
                                        href="mailto:{{ $company->email }}"
                                        target="_blank">{{ $company->email ?: 'N/A' }}</a></p>
                            </div>
                       <div class="col-md-3">
                        <p class="mt-5"></p>
                        <a href="{{ route('companies.index') }}" class="btn btn-primary btn-lg"><i
                                class="bi bi-arrow-left-circle"></i> Back to companies</a>                        
                       </div>
                        </div>


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
