@extends('layouts.admin')
@section('content')
<main class="container">
    <div class="row g-5 p-4">
        <h1 class="text-success fw-light"><i class="bi bi-substack"></i> Manage Blog Posts</h1>
      <div class="col-md-12">    
        @foreach ($posts as $post)
        <div class="row mb-3 pb-3 border-bottom">
         <div class="col-md-10"><h2 class="fw-light"><a href="/blog/update/{{$post->id}}"> {{$post->title}} </a></h2><p>{{$post->summary}}</p>
            <p class="text-muted"><i class="bi bi-calendar-event"></i> {{date("F j, Y", strtotime($post->created_at))}}</p></div>
         <div class="col-md-2"><a href="/blog/update/{{$post->id}}"><img src="{{$post->image}}" class="img-fluid img-thumbnail" /></a> </div> 
         </div> 
        @endforeach
        <div class="row p-5"> {{ $posts->links('vendor.pagination.blog') }} </div>
    </div>
   
    </div>
   
  </main>

        </div>


      
      
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
    @endsection