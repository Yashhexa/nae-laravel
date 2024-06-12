@extends('layouts.admin')

@section('content')
<style>
    .card {
    border: none;
    border-radius: 10px
}

.c-details span {
    font-weight: 300;
    font-size: 13px
}

.icon {
    width: 50px;
    height: 50px;
    background-color: #eee;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 39px
}

.badge span {
    background-color: #fffbec;
    width: 60px;
    height: 25px;
    padding-bottom: 3px;
    border-radius: 5px;
    display: flex;
    color: #fed85d;
    justify-content: center;
    align-items: center
}
</style>
    <div class="container">

        <ul class="nav nav-tabs mt-4">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/visitors">Site Traffic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop-stats">Shop Stats</a>
            </li>

        </ul>
        <div class="p-5 m-20 bg-white rounded shadow">

            <div class="row">

                <h1 class="text-primary fw-light "><i class="bi bi-person-workspace"></i> Latest web site visitors
                </h1>
            </div>

            @foreach ($visitors as $visit)
                <div class="row border p-3 mt-2 mb-4">
                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b><i class="bi bi-calendar3"></i> Date/Time:</b>
                                {{ date('F j, Y, g:i a', strtotime($visit->created_at)) }}.</li>
                            <li class="list-group-item"><b><i class="bi bi-pc-display-horizontal"></i> {{ $visit->ip }}</b> -
                                {{ $visit->city_name }}, {{ $visit->region_name }} {{ $visit->zip_code }} {{ $visit->country_code }}</li>
                            <li class="list-group-item"><b><i class="bi bi-link-45deg"></i> Page:</b> <a href="{{ URL($visit->page) }}"
                                target="_blank">{{ URL($visit->page) }}</a></li>
                          </ul>

                       
                        @if ($visit->user_id != null)
                            @php
                                $customer = App\Http\Controllers\Users::Customer($visit->user_id);
                            @endphp
                        <div class="card border">
                            <div class="card-header">
                                <i class="bi bi-person-circle"></i>    {{$customer->name}}  {{$customer->lname}}
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">{{$customer['userInfo']->address}}</li>
                              <li class="list-group-item">{{$customer['userInfo']->city}}, {{$customer['userInfo']->state}}, {{$customer['userInfo']->zip}}</li>
                              <li class="list-group-item">Email: <a href="mailto:{{$customer->email}}">{{$customer->email}}</a></li>                            
                            </ul>
                          </div>                       
                      @endif
                      
                    </div>
                    <div class="col-md-4">
                        <iframe width="100%" height="250" frameborder="0" style="border:0; float:right;"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDKL4hfsX3iwdSvg1hQnNhzvfpPxL8f7d8&zoom=10&center={{ $visit->latitude }},{{ $visit->longitude }}"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row p-5">
            {{ $visitors->links('vendor.pagination.plain') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
