@extends('layouts.admin')

@section('template_title')
    {{ __('Update') }} Attribute
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12 mt-3">
                <h1 class="text-success mt-3"><i class="bi bi-bug"></i> Edit Attribute: <span class="text-primary">{{$attribute->name}}</span></h1>
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Attribute</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('attributes.update', $attribute->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('attribute.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>    
@endsection
