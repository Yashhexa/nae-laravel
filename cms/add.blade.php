@extends('layouts.admin')

@section('content')

<div class="container p-3">
<div class="row mt-3">
    <ul class="nav nav-tabs" id="page_type_tabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="local-tab" data-bs-toggle="tab" data-bs-target="#local-tab-pane" type="button" role="tab" aria-controls="local-tab-pane" aria-selected="true">Local Page</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="remote-tab" data-bs-toggle="tab" data-bs-target="#remote-tab-pane" type="button" role="tab" aria-controls="remote-tab-pane" aria-selected="false">Remote Page</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="local-tab-pane" role="tabpanel" aria-labelledby="local-tab" tabindex="0">
            @include('cms.local')
        </div>
        <div class="tab-pane fade" id="remote-tab-pane" role="tabpanel" aria-labelledby="remote-tab" tabindex="0">
            @include('cms.remote')
        </div>
       
      </div>
</div>
</div>
  
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
