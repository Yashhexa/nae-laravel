@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">Add blocks for <span class="text-info">{{$page->name}}</span></h1>
                <form action="{{ route('saveblocks') }}" method="post" class="form mt-5">
                    @csrf
                    @foreach ($blocks as $key=>$block)
                    <label id="{{ $block }}" class="mt-3">Block: {{ $block }}</label>
                    <textarea id="block___{{trim($block)}}" name="block___{{trim($block)}}"></textarea>                       

                     @endforeach
                    <input type="hidden" name="page_id" value="{{$page->page_id}}" />
                    <button type="submit" class="btn btn-outline-primary btn-lg mt-3 float-end">Add Blocks</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
     @foreach ($blocks as $key => $block)
     @php $block_id = 'block___' . trim($block); @endphp
     <div class="modal fade" id="{{ $block_id }}_imagePickerModal" role="dialog" aria-labelledby="{{ $block_id }}_imagePickerModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="{{ $block_id }}_imagePickerModalLabel">Select Image</h5>
                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <!-- List of images on the server -->
                     <div class="row" id="{{ $block_id }}_imageList">
                         @foreach ($images as $image)
                         <div class="col-md-4"><img src="/media/{{$image}}" alt="Image {{$block_id}}" class="img-thumbnail"></div>    
                         @endforeach
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>        
     <script>
         $(document).ready(function() {
             var customButton = function (context) {
             var ui = $.summernote.ui;
             var button = ui.button({
                 contents: '<i class="bi bi-images"></i>',
                 tooltip: 'Open Image Picker',
                 click: function () {
                     $('#{{ $block_id }}_imagePickerModal').modal('show');
                 },
             });
             return button.render();
         };                
             $('#{{ $block_id }}').summernote({
                 placeholder: 'Add your content...',
                 height: 220,
                 toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline']],
                     ['color', ['color']],
                     ['forecolor', ['forecolor']],
                     ['hr', ['hr']],
                     ['clear', ['clear']],
                     ['para', ['ul', 'ol', 'paragraph']],
                     ['table', ['table']],
                     ['codeview', ['codeview']],
                     ['insert', ['link', 'video', 'customButton']],

                 ],
                 buttons: {
                 customButton: customButton,
             },
             });
             $('#{{ $block_id }}_imageList img').click(function () {
             var imageUrl = $(this).attr('src');
             $('#{{ $block_id }}').summernote('editor.insertImage', imageUrl);
             $('#{{ $block_id }}_imagePickerModal').modal('hide');
         });           
         });

     </script>
 @endforeach

    <script>
        $(document).on("click", ".image", function() {
            var imgsrc = $(this).data('id');
            $('#template_image').attr('src', imgsrc);
        })
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>    
@endsection
