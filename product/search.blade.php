@extends('layouts.layouts')

@section('template_title')
    Product
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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
    <label for="length">Length (inches): </label>
     <input id="length" name="min_length" value="{{Request::get('min_length')}}" placeholder="Min Length..." type="text"
                    class="form-control">
    <input id="length" name="max_length" value="{{Request::get('max_length')}}" placeholder="Max Length..." type="text"
                    class="form-control">
        </div>
    
                    <div class="col-md-2">
    <label for="width">Width (inches): </label>
    <input id="width" value="{{Request::get('min_width')}}" name="min_width" placeholder="Min Width..." type="text"
                                    class="form-control">
    <input id="width" value="{{Request::get('max_width')}}" name="max_width" placeholder="Max Width..." type="text"
                                    class="form-control">
                        </div>
    <div class="col-md-2">
        <label for="height">Height (inches): </label>
    <input id="height" value="{{Request::get('min_height')}}" name="min_height" placeholder="Min Height..." type="text"
                                    class="form-control">
    <input id="height" value="{{Request::get('max_height')}}" name="max_height" placeholder="Max Height..." type="text"
                                    class="form-control">
    </div>
                    
                    <div class="col-md-2 d-grid gap-2"><button type="submit"
                            class="btn btn-success btn-lg btn-block mt-4">Search <i class="bi bi-search"></i></button>
                    </div></div>
                </div>
            </div>
        </form>
    </section>  
    <div class="container-fluid mt-3">
        <div class="row">
   @isset($category)
    <div class="col-md-12 mb-3"><h1 class="text-success fw-light"><i class="bi bi-shop-window"></i>   
 {{$category->name}} </h1>
    {{$category->description}} </div>
    @else
    <div class="col-md-12 mb-3"><h1 class="text-success fw-light"><i class="bi bi-shop-window"></i> Search products  </h1>
 </div>
    @endisset

    @php
    $userId = null;
    if(auth()->check()) {
        $userId = auth()->user()->id;
    }
    @endphp

 
                @foreach ($products as $product)
                <div class="col-lg-3 col-12">
                    <div class="card mb-2 image_wrapper">
                 <a href="/enclosures/{{$product->url_key}}"> 
                   @if($product->image_url != '')
                   <img src="{{$product->image_url}}" class="card-img-top" width="100%">
                   @else
                   <img src="/images/noimage.png" class="card-img-top" width="100%">
                   @endif
                   @if ($product->category_id == "14")
                   <div class="overlay">
                       <img src="/images/comingsoon-sm.png"/>
                   </div>    
                   @endif                
                </a>
                  <div class="card-body pt-0 px-0">
                    <div class="d-flex flex-row justify-content-between mb-0 px-3">
                      <h3 class="text-muted mt-1">{{$product->name}}<br /><small class="text-warning fs-5 mb-2">SKU: {{$product->sku}}</small></h3>
                      
                    </div>
                    <hr class="mt-2 mx-3">
                    <div class="d-flex flex-row justify-content-between px-3 pb-4">
                      <div class="d-flex flex-column"><span class="text-muted">Height</span></div>
                      <div class="d-flex flex-column"><h5 class="mb-0">{{number_format($product->height, 2, '.', '')}}"</h5></div>
                                            
                    </div>
                    <div class="d-flex flex-row justify-content-between px-3 pb-4">
                        <div class="d-flex flex-column"><span class="text-muted">Width</span></div>
                        <div class="d-flex flex-column"><h5 class="mb-0">{{number_format($product->width, 2, '.', '')}}"</h5></div> 

                    </div>
                    <div class="d-flex flex-row justify-content-between px-3 pb-4">
                        <div class="d-flex flex-column"><span class="text-muted">Length</span></div>
                        <div class="d-flex flex-column"><h5 class="mb-0">{{number_format($product->length, 2, '.', '')}}"</h5></div>
                    </div>

                    <div class="mx-3 mt-3 mb-2"><a href="/enclosures/{{$product->url_key}}" class="btn btn-success btn-block"><i class="bi bi-cart-check"></i> View</a>
                    @if(auth()->check())
                     <a href="/3d-configurator/frontend/?productId={{ $product->id }}&userId={{ $userId }}" class="btn btn-primary btn-block"><i class="bi bi-palette2"></i> Customize</a>
                    @else
                     <a href="/3d-configurator/frontend/?productId={{ $product->id }}" class="btn btn-primary btn-block"><i class="bi bi-palette2"></i> Customize</a>
                    @endif
                    </div>
                    
                  </div>
                </div>
                  </div>              
                @endforeach
                <div class="row p-5"> {{ $products->links('vendor.pagination.bootstrap-5') }} </div>
      
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
