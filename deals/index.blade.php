@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="GET" action="{{ route('deals.search') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" name="search" placeholder="Search by keyword..."
                            aria-label="Keyword" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <form method="GET" action="{{ route('deals.search') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="bi bi-chevron-double-down"></i></i></span>
                        <select id="contact_id" class="form-control" name="search">
                            <option>Search by contact</option>
                            @foreach ($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2 text-end"><a href="/deals/create" class="btn btn-primary"><i class="bi bi-cash-coin"></i>
                    Add a Deal</a></div>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="fw-light text-success border-bottom"><i class="bi bi-award"></i> Deals</h1>
                </div>
                @foreach ($deals as $k => $deal)
                    <div class="col-md-3">
                        @if ($k == "Prospect")
                        <div class="bg-primary border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-funnel"></i> {{ $k }}</div>
                        @elseif ($k == "Qualified")   
                        <div class="bg-secondary border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-hand-thumbs-up"></i> {{ $k }}</div>   
                        @elseif ($k == "Contacted")   
                        <div class="bg-warning border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-telephone-outbound"></i> {{ $k }}</div> 
                        @elseif ($k == "Proposal Sent")   
                        <div class="bg-info border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-send"></i> {{ $k }}</div> 
                        @elseif ($k == "Negotiation")   
                        <div class="bg-dark border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-chat-dots"></i> {{ $k }}</div> 
                        @elseif ($k == "Won")   
                        <div class="bg-success border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-award"></i> {{ $k }}</div> 
                        @elseif ($k == "Lost")   
                        <div class="bg-danger border-bottom p-2 text-white text-center fs-3" style="margin-bottom: -9px;">
                            <i class="bi bi-emoji-frown"></i> {{ $k }}</div>                                                                                                                                                                   
                        @endif
                        <div class="bg-body-secondary pt-1 pb-1">
                            @foreach ($deal as $item)
                                <div class="card m-2">
                                    <div class="card-header">
                                        <i class="bi bi-calendar-check"></i>
                                        {{ date('F j, Y, g:i a', strtotime($item->created_at)) }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text">Contact: <b><a
                                                    href="/contacts/{{ $item['contact']->id }}">{{ $item['contact']->name }}</a></b>
                                            <br />Close: <b>{{ date('F j, Y', strtotime($item->closing_date)) }}</b>
                                        </p>
                                        <div class="text-center">
                                            <a href="{{ route('deals.show', $item) }}"
                                                class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('deals.edit', $item) }}"
                                                class="btn btn-secondary btn-sm">Edit</a>
                                            <form action="{{ route('deals.destroy', $item) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this deal?')">Delete</button>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
<div class="col-md-12 m-3">
    <h3 class="mt-3">Status Codes</h3>
    <strong class='text-primary'>Prospect:</strong> The initial stage when the deal is identified but not yet qualified.<br>
    <strong class='text-secondary'>Qualified:</strong> The lead has been vetted and deemed a potential opportunity.<br>
    <strong class='text-warning'>Contacted:</strong> Initial contact has been made with the lead.<br>
    <strong class='text-info'>Proposal Sent:</strong> A proposal or quote has been sent to the lead.<br>
    <strong class='text-dark'>Negotiation:</strong> Negotiations are ongoing.<br>
    <strong class='text-success'>Won:</strong> The deal has been successfully closed.<br>
    <strong class='text-danger'>Lost:</strong> The deal did not materialize.  
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
