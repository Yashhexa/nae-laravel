@extends('layouts.admin')

@section('content')
<div class="container">
    <ul class="nav nav-tabs mt-4">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Sales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/visitors">Site Traffic</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/shop-stats">Shop Stats</a>
        </li>

      </ul>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="p-5 m-20 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
            </div>
          </div>
            <div class="row p-5  bg-white rounded shadow">
              <div class="col-md-8 col-8"><h3 class="fw-light">Product</h3></div>
              <div class="col-md-4 col-4 text-end"><h3 class="fw-light">Units Sold</h3></div>
              @foreach ($products as $k=>$product) 
              <div class="col-md-8 col-8 border-bottom pt-1">
             <a href="/enclosures/{{$k}}.html" class="text-decoration-none" target="_blank">{{$product['name']}}</a>
                </div>
                <div class="col-md-4 col-4 text-end border-bottom p-1">
                  {{number_format($product['qty'])}}
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