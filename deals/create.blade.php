@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white display-6"><i class="bi bi-cash-coin"></i> Create a Deal</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('deals.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id" class="text-success">NAE Agent</label>
                                        <select id="user_id" class="form-control" name="user_id" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_id" class="text-success">{{ __('Contact') }}</label>
                                        @if (isset($contacts->name))
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $contacts->name }}" placeholder="{{ $contacts->name }}"
                                                disabled />
                                            <input type="hidden" name="contact_id" value="{{ $contacts->id }}" />
                                        @else
                                            <select id="contact_id" class="form-control" name="contact_id" required>
                                                @foreach ($contacts as $contact)
                                                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="text-success">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="description" class="text-success">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description"></textarea>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amount" class="text-success">{{ __('Amount') }} <small class="text-black-50">(numbers only)</small></label>
                                        <input id="amount" placeholder="$" type="text" class="form-control" name="amount" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status" class="text-success">{{ __('Status') }} <a href="#" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<strong class='text-primary'>Prospect:</strong> The initial stage when the deal is identified but not yet qualified.<br>
                                            <strong class='text-secondary'>Qualified:</strong> The lead has been vetted and deemed a potential opportunity.<br>
                                            <strong class='text-warning'>Contacted:</strong> Initial contact has been made with the lead.<br>
                                            <strong class='text-info'>Proposal Sent:</strong> A proposal or quote has been sent to the lead.<br>
                                            <strong class='text-secondary'>Negotiation:</strong> Negotiations are ongoing.<br>
                                            <strong class='text-success'>Won:</strong> The deal has been successfully closed.<br>
                                            <strong class='text-danger'>Lost:</strong> The deal did not materialize."><i class="bi bi-question-circle-fill"></i></a></label>
                                        <select name="status" class="form-control" required>
                                            <option value="Prospect">Prospect</option>
                                            <option value="Qualified">Qualified</option>
                                            <option value="Contacted">Contacted</option>
                                            <option value="Proposal Sent">Proposal Sent</option>
                                            <option value="Negotiation">Negotiation</option>
                                            <option value="Won">Won</option>
                                            <option value="Lost">Lost</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="closing_date" class="text-success">{{ __('Closing Date') }}</label>
                                        <input id="closing_date" type="date" class="form-control" name="closing_date">
                                    </div></div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="bi bi-pen"></i> {{ __('Create') }}</button>
                            <a href="{{ route('deals.index') }}" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> {{ __('Cancel') }}</a>
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

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
