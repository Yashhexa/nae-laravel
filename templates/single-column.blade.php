{{-- header, footer, block_1, block_2, block_3 --}}
@extends('layouts.inside')

@section('content')

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
<div class="container">
    <div class="row">

        <div class="col-md-12  p-3">
            {!!$block_data['block___header']!!}
            {!!$block_data['block___block_1']!!}
            {!!$block_data['block___block_2']!!}
            {!!$block_data['block___block_3']!!}
                    </div>        
    </div>
    <div class="row">
        <div class="col-12 p-3">
            {!!$block_data['block___footer']!!}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" async defer>
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js' async defer></script>
@endsection
