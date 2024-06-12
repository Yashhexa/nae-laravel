@extends('layouts.admin')

@section('template_title')
    Product
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    </section>
    <div class="container-fluid mt-3">
        <div class="row"><div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                     <h1 class="text-primary fw-light"><i class="bi bi-cash-coin"></i> Update Product Prices </h1>
                    </div>
                    <div class="card-body">

                      <p class="card-text">
                        <a href="/update_prices" class="btn btn-primary btn-lg">Update Prices</a>
                      </p>

                    </div>
                  </div>
            </div><div class="col-sm-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
