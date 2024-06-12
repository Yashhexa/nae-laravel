@extends('layouts.blog')
@section('content')
    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded blog-slider">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Blog - New Age Enclosures</h1>
                <p class="lead my-3">Discover the latest gems in our collection of blog articles below. </p>

            </div>
        </div>

        <div class="row mb-2">
            @foreach ($featured as $f_post)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong
                                class="d-inline-block mb-2 text-primary">{{ date('F j, Y', strtotime($f_post->created_at)) }}</strong>
                            <h3 class="mb-0">{{ $f_post->title }}</h3>

                            <p class="mb-auto">{{ $f_post->summary }}</p>
                            <a href="/post/{{ $f_post->url }}" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            @php
                            if(file_exists('.'.$f_post->image)){
                                echo '<img src="'.$f_post->image.'" height="250" />';
                            }
                        @endphp

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-5">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-md-3"><a href="/post/{{ $post->url }}"><img src="{{ $post->image }}"
                                    class="img-fluid img-thumbnail" /></a> </div>

                        <div class="col-md-9">
                            <h2 class="fw-light"><a href="/post/{{ $post->url }}" class="text-decoration-none"> {{ $post->title }} </a></h2>
                            <p>{{ $post->summary }}</p>
                            <p class="text-muted"><i class="bi bi-calendar-event"></i>
                                {{ date('F j, Y', strtotime($f_post->created_at)) }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="row p-5"> {{ $posts->links('vendor.pagination.blog') }} </div>
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
