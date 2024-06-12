@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-end mb-3">

<a href="/deals/create/contact/{{$contact->id}}" class="btn btn-success"><i class="bi bi-cash-coin"></i> Create a Deal</a>

            </div>
            
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white fs-3 fw-light"><i class="bi bi-person"></i> Contact Details <span class="float-end"> Contact Added: <span class="text-warning">{{date("F j, Y, g:i a", strtotime($contact->created_at))}}</span></span></div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-2 text-center">
                        @if ($contact->company->logo)
                            <img src="{{ asset('storage/' . $contact->company->logo) }}" class="img-fluid" alt="Company Logo"
                                style="max-height: 200px;">
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">{{$contact->company->name}}</li>
                            <li class="list-group-item">{{$contact->company->street}} {{$contact->company->city}} {{$contact->company->state}} {{$contact->company->zip}}</li>
                            <li class="list-group-item"><i class="bi bi-telephone-fill"></i>: <a href="tel:{{$contact->company->phone}}">{{$contact->company->phone}}</a></li>
                            <li class="list-group-item"><i
                                class="bi bi-envelope-at-fill"></i>: <a href="mailto:{{$contact->company->email}}">{{$contact->company->email}}</a></li>
                            <li class="list-group-item">Added: {{date("F j, Y, g:i a", strtotime($contact->company->created_at))}}</li>
                          </ul>
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-light text-success ms-3 border-bottom p-2"><i class="bi bi-person-circle"></i> {{ $contact->name }}</h1>
                        <p class="ms-3 border-bottom p-2"> <strong><i class="bi bi-buildings"></i> Company:</strong>
                          <a href="/companies/{{$contact->company->id}}"> {{ $contact->company->name }}</a></p>
                        <div class="row mt-3">
                            <div class="col-md-6 text-center">
                             <span class="circle-blue"><a href="mailto:{{ $contact->email }}" class="text-white"><i
                                            class="bi bi-envelope-at-fill"></i> </a></span>
                                <p class="p-3 text-primary">{{ $contact->email }}</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="circle-blue"><a href="tel:{{ $contact->phone }}" class="text-white"><i class="bi bi-telephone-fill"></i> </a></span>
                        <p class="p-3 text-primary">{{ $contact->phone }}</p>                               
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12">

                        <iframe class="border mb-3" src="https://www.google.com/maps?q={{$contact->company->street}} {{$contact->company->city}} {{$contact->company->state}} {{$contact->company->zip}}&output=embed" width="100%" height="250px"></iframe>
                    </div>
                </div>
                <a href="{{ route('contacts.index') }}" class="btn btn-primary btn-lg"><i class="bi bi-arrow-left-circle"></i> Back to contacts</a>   </div>
           
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
