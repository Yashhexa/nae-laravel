@extends('layouts.admin')

@section('template_title')
    {{ __('Create') }} Photo
@endsection

@section('content')
<style>
.thumbnails {
    display: flex;
    flex-wrap: wrap;
}

.thumbnail {
    cursor: pointer;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal img {
    width: auto; 
    height: auto;
    display: block;
    margin: 50px auto;
}

.close {
    color: #fff;
    font-size: 60px;
    position: absolute;
    top: 15px;
    right: 20px;
    cursor: pointer;
}
</style>    
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default mt-3">
                    <div class="card-header bg-primary">
                        <span class="card-title text-white"><i class="bi bi-cloud-upload"></i> Upload Image</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('uploadmedia') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" name="file" class="form-control" />
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-outline-secondary mt-3">{{ __('Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5"><h3 class="text-success fw-light"><i class="bi bi-images"></i> Image Library</h3></div>
        <div class="row mt-2 border-top">
            @foreach ($images as $image)
                <div class="col-md-2 p-3 col-4 border border-light-subtle text-center">
                    <div class="row mb-3"><div class="col-md-12"><a href="/delimage/{{$image}}" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i> Delete</a></div></div>                    
                    <img src="/media/{{$image}}" style="max-height: 120px;" class="img-fluid thumbnail" data-modal="{{str_replace(".webp","",$image)}}" />              
                </div>
            @endforeach
        </div>
<div class="row mt-5"> 
@if (Request::get('page') > 1)
<div class="col-md-6"><a href="/showmedia?page={{Request::get('page') - 1 }}" class="btn btn-primary">Prev Page</a></div>
<div class="col-md-6"><a href="/showmedia?page={{Request::get('page') + 1}}" class="btn btn-primary">Next Page</a></div> 
@else
<div class="col-md-6"><a href="/showmedia?page=2" class="btn btn-primary">Next Page</a></div>
@endif
</div>
    </section>
    @foreach ($images as $modal)
    <div id="{{str_replace(".webp","",$modal)}}" class="modal">
        <span class="close">&times;</span>
        <img src="/media/{{$modal}}" class="img-fluid">
    </div>    
    @endforeach    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script>
    $(document).ready(function () {
    $(".thumbnail").click(function () {
        var modalId = $(this).data("modal");
        $("#" + modalId).css("display", "block");
    });

    $(".close").click(function () {
        $(this).parent().css("display", "none");
    });
});
</script>
@endsection
