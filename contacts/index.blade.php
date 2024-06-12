@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <div class="row mb-2 border-bottom">
            <div class="col-md-10">
                <h1 class="fw-light text-success"><i class="bi bi-person"></i> Contacts</h1>
            </div>
            <div class="col-md-2"><a href="/contacts/create" class="btn btn-outline-success"><i class="bi bi-person-plus"></i> Add new contact</a></div>
        </div>
        @foreach ($contacts as $contact)
            <div class="row mb-1 rows-data text-center">
                <div class="col-md-2 p-1 bg-light">{{$contact->name}}</div>
                <div class="col-md-3 p-1">{{ $contact->company->name }}</div>
                <div class="col-md-3 p-1 bg-light"><i class="bi bi-envelope"></i> <a href="mailto:{{ $contact->email }}"> {{ $contact->email }}</a></div>
                <div class="col-md-2 p-1"><i class="bi bi-telephone"></i> <a href="tel:{{ $contact->phone }}"> {{ $contact->phone }}</a></div>
                <div class="col-md-2 p-1 bg-light">

                    <a href="{{ route('contacts.edit', $contact) }}"  data-bs-toggle="tooltip" data-bs-title="Edit Contact" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> </a>
                    <a href="{{ route('contacts.show', $contact) }}"  data-bs-toggle="tooltip" data-bs-title="View Contact" class="btn btn-sm btn-success"><i class="bi bi-view-list"></i> </a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-bs-toggle="tooltip" data-bs-title="Delete Contact"  class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this contact?')"><i class="bi bi-trash"></i> </button>
                    </form>

                </div>
            </div>
        @endforeach

        <div class="row mt-3">
            {{ $contacts->links('vendor.pagination.plain') }}
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
