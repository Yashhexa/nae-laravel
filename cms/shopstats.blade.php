@extends('layouts.admin')

@section('content')
<div class="container">
    <ul class="nav nav-tabs mt-4">
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">Sales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/visitors">Site Traffic</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/shop-stats">Shop Stats</a>
        </li>

      </ul>
        <div class="row mb-4 bg-white rounded shadow">
            <div class="col-md-12">
                <div class="p-5 m-20">
                    {!! $chart->container() !!}
                </div>
            </div>

        </div>
        <div class="row mb-4 bg-white rounded shadow pb-5">
          <div class="col-md-12 p-3"><h1 class="text-primary fw-light border-bottom">Product views for the last 30 days</h1></div>
          @foreach ($enclosures as $k=>$enclosure)
          <div class="col-md-4 ps-4" style="font-size: 14px;">
SKU <b><a href="/enclosures/{{$k}}.html" target="_blank"> {{$k}}</a></b> has been viewed 
@if ($enclosure > 1)
<b>{{$enclosure}}  times</b>
@else
<b>{{$enclosure}}  time</b>
@endif
          </div>
        @endforeach
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endsection