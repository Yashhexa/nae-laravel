{{-- header, block_1_left, block_1_right, block_2_left, block_2_right, block_3_left, block_3_right, block_4_left, block_4_right, footer --}}
@extends('layouts.inside')

@section('content')
    
<div class="container pt-4">
    <div class="row align-items-center">
        <div class="col-md-12 mt-3">{!!$block_data['block___header']!!}</div>
    </div>
    <div class="row align-items-center border-bottom pb-3 mb-3">
        <div class="col-md-6 p-2">
        {!!$block_data['block___block_1_left']!!}
        </div>
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_1_right']!!}
        </div>
    </div>
    <div class="row align-items-center border-bottom pb-3 mb-3">
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_2_left']!!}
        </div>
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_2_right']!!}
        </div>
    </div>
    <div class="row align-items-center border-bottom pb-3 mb-3">
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_3_left']!!}
        </div>
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_3_right']!!}
        </div>
    </div>
    <div class="row align-items-center border-bottom pb-3 mb-3">
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_4_left']!!}
        </div>
        <div class="col-md-6  p-2">
            {!!$block_data['block___block_4_right']!!}
        </div>  
    </div>                
     <div class="row align-items-center">
        <div class="col-12 p-3">
            {!!$block_data['block___footer']!!}
        </div>
    </div>                   </div>        
 

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
