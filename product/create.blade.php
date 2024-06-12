@extends('layouts.admin')

@section('template_title')
    {{ __('Add') }} Product
@endsection

@section('content')
    <style>
        .displaynone {
            display: none;
        }
    </style>
    <section class="content container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-success"><i class="bi bi-pencil-square"></i> Add Product</h1>
                @includeif('partials.errors')
                <form method="POST" action="{{ route('enclosures.store', $product->id) }}" role="form"
                    enctype="multipart/form-data" class="form needs-validation" novalidate>@csrf
                    <div class="card card-default mb-5">
                        <div class="card-header">
                            <span class="card-title">Main Product Photo</span>
                        </div>
                        <div class="card-body">
                            @include('product.photos2')
                        </div>
               
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Product Info</span>
                    </div>
                    <div class="card-body">
                            @csrf
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-0" data-bs-toggle="tab" href="#tabpanel-0"
                                        role="tab" aria-controls="tabpanel-0" aria-selected="true">Main Info</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-1" data-bs-toggle="tab" href="#tabpanel-1"
                                        role="tab" aria-controls="tabpanel-1" aria-selected="false">Additional Data</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-2" data-bs-toggle="tab" href="#tabpanel-2"
                                        role="tab" aria-controls="tabpanel-2" aria-selected="false">Pricing</a>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="tab-content">
                                <div class="tab-pane active" id="tabpanel-0" role="tabpanel" aria-labelledby="tab-0">
                                    @include('product.form')</div>
                                <div class="tab-pane" id="tabpanel-1" role="tabpanel" aria-labelledby="tab-1"> @include('product.info')</div>
                                <div class="tab-pane" id="tabpanel-2" role="tabpanel" aria-labelledby="tab-2">
                                    @include('product.pricing')</div>
                            </div>
                            <div class="box-footer mt-5">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-database-add"></i> Save
                                    Product</button>
                            </div>

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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    
        $(document).ready(function(){
    
             $('#submit').click(function(){
       
                   // Get the selected file
                   var files = $('#file')[0].files;
                   var alt_tag = $('#alt_tag')[0].value;
                   var sort = $('#sort')[0].value;
    
                   if(files.length > 0){
                         var fd = new FormData();
    
                         // Append data 
                         fd.append('file',files[0]);
                         fd.append('p_id',{{$product->id}});
                         fd.append('alt_tag',alt_tag);
                         fd.append('sort',sort);
                         fd.append('_token',CSRF_TOKEN);
    
                         // Hide alert 
                         $('#responseMsg').hide();
    
                         // AJAX request 
                         $.ajax({
                              url: "{{ route('uploadFile') }}",
                              method: 'post',
                              data: fd,
                              contentType: false,
                              processData: false,
                              dataType: 'json',
                              success: function(response){
    
                                    // Hide error container
                                    $('#err_file').removeClass('d-block');
                                    $('#err_file').addClass('d-none');
    
                                    if(response.success == 1){ // Uploaded successfully
    
                                          // Response message
                                          $('#responseMsg').removeClass("alert-danger");
                                          $('#responseMsg').addClass("alert-success");
                                          $('#responseMsg').html(response.message);
                                          $('#responseMsg').show();
    
                                          // File preview
                                          $('#filepreview').show();
                                          $('#filepreview img,#filepreview a').hide();
                                          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){
    
                                                $('#filepreview img').attr('src',response.filepath);
                                                $('#filepreview img').show();
                                          }else{
                                                $('#filepreview a').attr('href',response.filepath).show();
                                                $('#filepreview a').show();
                                          }
                                    }else if(response.success == 2){ // File not uploaded
    
                                          // Response message
                                          $('#responseMsg').removeClass("alert-success");
                                          $('#responseMsg').addClass("alert-danger");
                                          $('#responseMsg').html(response.message);
                                          $('#responseMsg').show();
                                    }else{
                                          // Display Error
                                          $('#err_file').text(response.error);
                                          $('#err_file').removeClass('d-none');
                                          $('#err_file').addClass('d-block');
                                    } 
                              },
                              error: function(response){
                                    console.log("error : " + JSON.stringify(response) );
                              }
                         });
                   }else{
                         alert("Please select a file.");
                   }
    
             });
        });

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))        
        </script> 
        
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });            
            $(document).ready(function() {
                $('#description').summernote({
                    placeholder: 'Add your content...',
                    callbacks: {
                        onImageUpload: function(image) {
                            upload_description(image[0]);
                        },
                        onMediaDelete: function(target) {
                            // alert(target[0].src) 
                            deleteFile(target[0].src);
                        }                        
                    },
                    height: 220,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['forecolor', ['forecolor']],
                        ['hr', ['hr']],
                        ['clear', ['clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['codeview', ['codeview']],
                        ['insert', ['link', 'picture', 'video']]
                    ],
                });
            });

            function upload_description(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: '/enclosures/img_upload',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function(url) {
                        var image = $('<img>').attr('src', url);
                        $('#description').summernote("insertNode", image[0]);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function deleteFile(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "/enclosures/del_image",
                    cache: false,
                    success: function(resp) {
                        console.log(resp);
                    }
                });
                }            
        </script>        
@endsection
