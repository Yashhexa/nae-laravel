@extends('layouts.admin')

@section('template_title')
    Product Import
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row"><div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                     <h1 class="text-primary"><i class="bi bi-cloud-upload-fill"></i> Import Products </h1>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Upload an excel file</h5>
                      <p class="card-text">
                        <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('save') }}">
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="excel">  
                            @csrf
                            <button type="submit" class="btn btn-lg btn-primary mt-3 float-end"><i class="bi bi-cloud-upload-fill"></i> Upload</button>                         
                        </form>
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
