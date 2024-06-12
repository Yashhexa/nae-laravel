{{-- header, block_1, block_2, block_3, tab_1, tab_2, tab_3, tab_4, tab_1_content, tab_2_content, tab_3_content, tab_4_content, slider_1, slider_2, slider_3, footer --}}
@extends('layouts.home')

@section('content') 
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
           <div class="container-fluid slide1 slider-text">
                <div class="carousel-caption text-center mt-5">
                    {!!trim($block_data['block___slider_1'])!!}
                    <p><a class="btn btn-outline-light btn-lg" href="/housings/10">Browse <i class="bi bi-binoculars-fill"></i></a></p>
                </div>
            </div></div>
     
        <div class="carousel-item">

            <div class="container-fluid slide2 slider-text">
                <div class="carousel-caption text-center">
                    {!!trim($block_data['block___slider_2'])!!}
                    <p><a class="btn btn-secondary btn-lg" href="/tool.html">Learn more <i class="bi bi-lightbulb"></i></a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="container-fluid slide3 slider-text">
                <div class="carousel-caption text-end">
                    {!!trim($block_data['block___slider_3'])!!}
                    <p><a class="btn btn-outline-light btn-lg" href="/all">Browse enclosures <i
                        class="bi bi-eye-fill"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<section class="search-bar fw-lighter">
    <form method="GET" action="{{ route('search') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <label for="keyword">Part # or Description: </label>
                    <input id="keyword" value="{{Request::get('keyword')}}" type="text" placeholder="Enter keyword or SKU" name="keyword" class="form-control">
<select name="cat_id" class="form-control">
    <option value="">--Search By Category--</option>
    @php
    $cats = App\Http\Controllers\Menu::CatMenu();
    @endphp
    @foreach ($cats as $cat)
    <option value="{{ $cat[1] }}">{{ $cat[0] }}</option>
@endforeach    
    
</select>
                </div>
<div class="col-md-2">
<label for="min_length">Length (inches): </label>
 <input id="min_length" name="min_length" value="{{Request::get('min_length')}}" placeholder="Min Length..." type="text"
                class="form-control">
<input id="max_length" name="max_length" value="{{Request::get('max_length')}}" placeholder="Max Length..." type="text"
                class="form-control">
    </div>

                <div class="col-md-2">
<label for="min_width">Width (inches): </label>
<input id="min_width" value="{{Request::get('min_width')}}" name="min_width" placeholder="Min Width..." type="text"
                                class="form-control">
<input id="max_width" value="{{Request::get('max_width')}}" name="max_width" placeholder="Max Width..." type="text"
                                class="form-control">
                    </div>
<div class="col-md-2">
    <label for="min_height">Height (inches): </label>
<input id="min_height" value="{{Request::get('min_height')}}" name="min_height" placeholder="Min Height..." type="text"
                                class="form-control">
<input id="max_height" value="{{Request::get('max_height')}}" name="max_height" placeholder="Max Height..." type="text"
                                class="form-control">
</div>
                
                <div class="col-md-2 d-grid gap-2"><button type="submit"
                        class="btn btn-success btn-lg btn-block mt-4">Search <i class="bi bi-search"></i></button>
                </div></div>
            </div>
        </div>
    </form>
</section>
<div class="container">
    <div class="row pt-5">{!!trim($block_data['block___header'])!!}
        <div class="col-md-12">{!!trim($block_data['block___block_1'])!!}</div>
        <div class="col-md-12 mt-3">{!!trim($block_data['block___block_2'])!!}</div>
        <div class="col-md-12 mt-3">{!!trim($block_data['block___block_3'])!!}</div>        
<div class="row">
    <div class="col-md-12">
            
        <section id="vertical_tab_nav">

            <ul class="tabs">
                <li><a rel="tab1" href="#">{!!strip_tags(trim($block_data['block___tab_1']))!!}</a></li>
                <li><a rel="tab2" href="#">{!!strip_tags(trim($block_data['block___tab_2']))!!}</a></li>
                <li><a rel="tab3" href="#">{!!strip_tags(trim($block_data['block___tab_3']))!!}</a></li>
                <li><a rel="tab4" href="#">{!!strip_tags(trim($block_data['block___tab_4']))!!}</a></li>
            </ul>

            <div class="tab_container">

                <article id="tab1">
                    {!!trim($block_data['block___tab_1_content'])!!}
                </article>

                <article id="tab2">
                    {!!trim($block_data['block___tab_2_content'])!!}
                </article>

                <article id="tab3">
 
                    {!!trim($block_data['block___tab_3_content'])!!}
                </article>

                <article id="tab4">

                    {!!trim($block_data['block___tab_4_content'])!!}
                </article>

            </div>
        </section>
          
    </div><div class="col-md-12"> {!!trim($block_data['block___footer'])!!}</div>  

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
            <a href="/enclosures/{{$item->url_key}}">
              @if (is_file(public_path($item->image_url))) 
              <img src="{{$item->image_url}}" style="max-height: 186px;" class="card-img-top" alt="{{$item->name}}">
              @else
              <img src="/images/noimage.png" style="max-height: 186px;" class="card-img-top" alt="{{$item->name}}">
                
              @endif</a>
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
</div>

    </div>
</div>


@endsection
