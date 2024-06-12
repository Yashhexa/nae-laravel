@extends('layouts.home')

@section('content')
<div class="container">

<div class="row mt-3">
<div class="col-md-9"><h1 class="fw-light text-secondary mb-3">({{$item_count}}) Items in your cart:</h1>

@foreach ($cart as $item)  
<div class="row border-bottom p-1">
<div class="col-md-2 border-end"><a href="/enclosures/{{$item[1]->url_key}}"><img src="{{$item[1]->image_url}}" class="img-fluid" /></a></div>
<div class="col-md-7">
    <a href="/enclosures/{{$item[1]->url_key}}" style="text-decoration: none;"><h3 class="text-primary fw-light">{{$item[1]->name}}</h3></a>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">SKU/Part No. - {{$item[1]->sku}}</li>
        <li class="list-group-item">{!!$item[1]->description!!}</li>

    </ul>
</div>
<div class="col-md-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Quantity: <strong>{{number_format($item[0])}}</strong></li>
        <li class="list-group-item">Price: <strong>${{round($item[2], 2)}}</strong> each</li>
        <li class="list-group-item"><a href="/remove/{{$id}}/{{$item[3]}}" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Remove Item</a></li>
    </ul>

</div>
</div>
@endforeach

</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
           <h4> <i class="bi bi-info-circle-fill"></i> Order Summary</h4>
        </div>
        <ul class="list-group list-group-flush">
          @foreach ($cart as $item)
          <li class="list-group-item">
              <strong>{{ $item[1]->name }}</strong> <br /><small class="text-secondary">{{number_format($item[0])}}pc - ${{ number_format(($item[0] * $item[2]), 2, '.', ',') }}</small>
          </li>
      @endforeach

        <li class="card-footer">
        <h4>Total: <span class="text-success">${{number_format($total, 2, '.', ',')}}</span></h4>
        </li>
          <li class="list-group-item">Note: Orders are manually verified and shipping will be added after creating your invoice.</li>
          @guest
          <li class="list-group-item text-center d-grid gap-2"><a href="/login" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Log in to continue</a></li>
          @else
          <li class="list-group-item text-center d-grid gap-2"><a href="/checkout/{{ $id }}" class="btn btn-primary"><i class="bi bi-basket2-fill"></i> Continue to Check Out</a></li>
          @endguest
        </ul>
      </div>
      <div class="card mt-3">
        <div class="card-body  d-grid gap-2">
          <h5 class="card-title text-success"><i class="bi bi-life-preserver"></i> Need help?</h5>
          <p class="card-text">If you need help with your order or would simply like to place your order by phone, please call us at <strong>855-426-3625</strong> or click below  to contact us via the web site.</p>
          <a href="#" class="btn btn-success"><i class="bi bi-person-lines-fill"></i> Contact Us</a>
        </div>
      </div>
</div>
</div>
<div class="col-md-12">
  <div class="container my-3 mt-5" id="featureContainer">
      <div class="row mx-auto my-auto justify-content-center">
        <div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">

          <div class="float-end pe-md-4">
            <a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
              <i class="bi bi-arrow-left-circle"></i>
            </a> &nbsp;&nbsp;
            <a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
              <i class="bi bi-arrow-right-circle"></i>
            </a>
          </div>

          <div class="carousel-inner" role="listbox">
@php
$set = "active";
$userId = null;
if(auth()->check()) {
    $userId = auth()->user()->id;
}
@endphp                    
@foreach ($more as $item)
<div class="carousel-item {{$set}}">
<div class="col-md-3">
  <div class="card" >
    <img src="{{$item->image_url}}" class="card-img-top" alt="{{$item->name}}">
    <div class="card-body">
      <h5 class="card-title">{{$item->name}}</h5>
      <p class="card-text">SKU/Part No. {{$item->sku}}</p>
      <div class="btn-group" role="group" aria-label="Basic example">
      <a href="/enclosures/{{$item->url_key}}" class="btn btn-success">View Enclosure</a>
      @if(auth()->check())
          <a href="/3d-configurator/frontend/?productId={{ $item->id }}&userId={{ $userId }}" class="btn btn-primary">Customize</a>
      @else
          <a href="/3d-configurator/frontend/?productId={{ $item->id }}" class="btn btn-primary">Customize</a>
      @endif
      </div>
    </div>
  </div>
                      </div>
</div>  
@php
if($set == "active"){
$set = "";
}
@endphp    
@endforeach

          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</div>
@endsection