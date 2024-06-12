@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-bg-dark fs-4"><i class="bi bi-cash-coin"></i> {{ __('Edit Deal') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('deals.update', $deal) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id" class="text-info">NAE Agent</label>
                                        <select id="user_id" class="form-control" name="user_id" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_id" class="text-info">{{ __('Contact') }}</label>
                                            <select id="contact_id" class="form-control" name="contact_id" required>
                                                @foreach ($contacts as $contact)
                                                    <option value="{{ $contact->id }}" @if ($contact->id == $deal->contact_id) selected  @endif>{{ $contact->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="text-info">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ $deal->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description" class="text-info">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description">{{ $deal->description }}</textarea>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amount" class="text-info">{{ __('Amount') }}</label>
                                        <input id="amount" type="text" class="form-control" value="{{$deal->amount}}" name="amount" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status" class="text-info">{{ __('Status') }} <a href="#" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<strong class='text-warning'>Prospect:</strong> The initial stage when the deal is identified but not yet qualified.<br>
                                            <strong class='text-warning'>Qualified:</strong> The lead has been vetted and deemed a potential opportunity.<br>
                                            <strong class='text-warning'>Contacted:</strong> Initial contact has been made with the lead.<br>
                                            <strong class='text-warning'>Proposal Sent:</strong> A proposal or quote has been sent to the lead.<br>
                                            <strong class='text-warning'>Negotiation:</strong> Negotiations are ongoing.<br>
                                            <strong class='text-warning'>Won:</strong> The deal has been successfully closed.<br>
                                            <strong class='text-warning'>Lost:</strong> The deal did not materialize."><i class="bi bi-question-circle-fill"></i></a></label>
                                        <select name="status" class="form-control" required>
                                            <option value="Prospect" @if ($deal->status == "Prospect") selected  @endif>Prospect</option>
                                            <option value="Qualified"@if ($deal->status == "Qualified") selected  @endif>Qualified</option>
                                            <option value="Contacted" @if ($deal->status == "Contacted") selected  @endif>Contacted</option>
                                            <option value="Proposal Sent" @if ($deal->status == "Proposal Sent") selected  @endif>Proposal Sent</option>
                                            <option value="Negotiation" @if ($deal->status == "Negotiation") selected  @endif>Negotiation</option>
                                            <option value="Won" @if ($deal->status == "Won") selected  @endif>Won</option>
                                            <option value="Lost" @if ($deal->status == "Lost") selected  @endif>Lost</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="closing_date" class="text-info">{{ __('Closing Date') }}</label>
                                        <input id="closing_date" type="date" class="form-control" value="{{$deal->closing_date}}" name="closing_date">
                                    </div></div>
                            </div>

<hr />
                            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> {{ __('Update') }}</button>
                            <a href="{{ route('deals.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> {{ __('Cancel') }}</a>
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
