@extends('layouts.app')

@section('template_title')
    {{ $attribute->name ?? "{{ __('Show') Attribute" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Attribute</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('attributes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $attribute->key }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $attribute->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cost:</strong>
                            {{ $attribute->cost }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
