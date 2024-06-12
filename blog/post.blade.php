@extends('layouts.blog')
@section('content')
    <main class="container">

        <div class="row g-5">
            <div class="col-md-8 pt-4">
                <h1 class="text-success fw-light">{{ $post->title }}</h1>
                <div class="text-center"><img src="{{ $post->image }}" class="img-fluid img-thumbnail" /></div>
                <div class="text-primary fw-semibold p-3 fs-6"><i class="bi bi-calendar3"></i>
                    {{ date('F j, Y', strtotime($post->created_at)) }}</div>
                <div class="text-start p-3 mb-5 fs-5 fw-light">
                    {!! $post->content !!}</div>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4">
                        <h4 class="text-primary fw-light mt-3">Categories</h4>
                        @foreach ($categories as $category)
                            <div class="p-3 border-bottom"><a href="/posts/{{ $category->id }}"
                                    class="text-decoration-none"> {{ $category->name }} </a></div>
                        @endforeach
                    </div>
                </div>
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
