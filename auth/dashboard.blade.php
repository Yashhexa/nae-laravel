@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="box">
              <div id="bar"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div id="donut"></div>
            </div>
          </div>
        </div>  
        <div class="row mt-4 mb-4">
            <div class="col-md-6">
              <div class="box">
                <div id="area"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <div id="line"></div>
              </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> 
<script src='{{ asset('js/apexcharts.js') }}'></script>  
<script src='{{ asset('js/data.js') }}'></script>  
<script src='{{ asset('js/scripts.js') }}'></script> 
@endsection