@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-3">
                <h1 class="text-success"><i class="bi bi-pencil-square"></i> Edit: <span class="text-primary">
                        {{ $page->name }}</span></h1>
            </div>
            <div class="col-md-4 text-center mt-4">
                <div class="btn-group" role="group" aria-label="Basic example"><a href="/{{ $page->url_key }}"
                        target="_blank" class="btn btn-success"><i class="bi bi-eye-fill"></i> View
                        page</a><a href="/pages" class="btn btn-primary"><i class="bi bi-list-ol"></i> List
                        pages</a><a href="#" data-bs-toggle="modal" data-bs-target="#deletePage"
                        class="btn btn-danger"><i class="bi bi-trash"></i> Delete page</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('saveupdatedpage') }}" method="post" enctype="multipart/form-data"
                    class="form mt-5 needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" data-bs-toggle="modal" class="image" data-bs-target="#showTemplate"><img
                                    src="{{ asset('images/' . $page->template) }}.png" id="canvas"
                                    class="img-fluid" /></a>
                        </div>
                        <div class="col-md-9">
                            <label id="sort_label" class="text-info">Sort Order <a href="#" data-bs-toggle="tooltip"
                                    data-bs-title="A number representing the order in which this page will be displayed on the menu structure."><i
                                        class="bi bi-question-circle-fill text-success"></i></a></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                                <input type="text" name="sort" class="form-control" value="{{ $page->sort }}"
                                    aria-label="Sort order on the menu." required>
                                <div class="invalid-tooltip">
                                    Must enter the sort order for this page on the menu.
                                </div>
                            </div>
                            <label id="template" class="text-info">Select Template</label>
                            <div class="input-group ">
                                <select class="form-select mb-3" name="template" aria-label="Select parent page"
                                    onchange="displayImage(this);" required>
                                    <option selected value="">Select a template...</option>
                                    @foreach ($templates as $template)
                                        @if ($template == $page->template)
                                            <option value="{{ str_replace('templates/', '', $template) }}" selected>
                                                {{ str_replace('templates/', '', $template) }}</option>
                                        @else
                                            <option value="{{ str_replace('templates/', '', $template) }}">
                                                {{ str_replace('templates/', '', $template) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="invalid-tooltip">
                                Please select a template for this page.
                            </div>

                            <label id="parent_page_label" class="text-info">Parent Page</label>
                            <select class="form-select mb-3" name="parent_id" aria-label="Select parent page">
                                <option selected value="0">Select a parent page</option>
                                @foreach ($pages as $page_info)
                                    @if ($page_info->page_id == $page->parent_id)
                                        <option value="{{ $page_info->page_id }}" selected>{{ $page_info->name }}</option>
                                    @else
                                        <option value="{{ $page_info->page_id }}">{{ $page_info->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label id="page_title_label" class="text-info">Menu Name <a href="#"
                                    data-bs-toggle="tooltip"
                                    data-bs-title="This is the name that will be displayed as the menu item on your navigation."><i
                                        class="bi bi-question-circle-fill text-success"></i></a></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-menu-button-wide-fill"></i></span>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="menu name..." value="{{ $page->name }}" required>
                                <div class="invalid-tooltip">
                                    Please enter a name for the menu link.
                                </div>
                            </div>
                        </div>

                    </div>
                    <label id="page_title_label" class="text-info">Page Title</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-heading"></i></span>
                        <input type="text" class="form-control" id="page_title" name="page_title"
                            value="{{ $page->page_title }}" placeholder="Enter title..." required>
                        <div class="invalid-tooltip">
                            Please enter a title for this page.
                        </div>
                    </div>
                    <label id="page_desc" class="text-info">Page Description</label>
                    <div>
                        <textarea name="page_desc" style="min-height: 120px;" placeholder="Add description for this page..."
                            class="form-control mb-3">{{ $page->page_desc }}</textarea>
                    </div>
                    <label id="url_key" class="text-info">URL Key <a href="#" data-bs-toggle="tooltip"
                            data-bs-title="This is the URL that will be displayed in the browser bar."><i
                                class="bi bi-question-circle-fill text-success"></i></a></label>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-link-45deg"></i></span>
                        <input type="text" class="form-control" id="url-key" name="url_key"
                            value="{{ $page->url_key }}" required />
                        <div class="invalid-tooltip">
                            Please enter a URL key for this page.
                        </div>
                    </div>

                    @foreach ($blocks as $key => $block)
                        <?php $block_id = 'block___' . trim($block); ?>
                        <label id="{{ $block }}" class="text-info mt-3">Block: {{ $block }}</label>
                        <textarea id="block___{{ trim($block) }}" name="block___{{ trim($block) }}">
                            {!! $block_data[$block_id] !!}
                        </textarea>
                    @endforeach
                    <input type="hidden" name="page_id" value="{{ $page->page_id }}" />

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" name="is_home"
                            @if ($page->is_home == 1) checked @endif id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Make this my home page.
                        </label>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="in_menu" value="Yes" id="flexCheckDefault" checked>
                        <label id="url_key" class="text-info">Include this page on the menu<a href="#" data-bs-toggle="tooltip"
                            data-bs-title="Checking this checkbox will automatically place this page on your website's menu."><i
                                class="bi bi-question-circle-fill text-success"></i></a></label>
                    </div>                    
                    <button type="submit" class="btn btn-outline-primary btn-lg mt-3 float-end">Update Page</button>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade modal-lg" id="showTemplate" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="template_image" class="img-fluid" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletePage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Are you sure??</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This action cannot be undone!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="/delete/{{ $page->page_id }}" class="btn btn-danger">Yes</a>
                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                        ['font', ['bold', 'underline', 'italic']],
                        ['color', ['color']],
                        ['forecolor', ['forecolor']],
                        ['hr', ['hr']],
                        ['clear', ['clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['codeview', ['codeview']],
                        ['insert', ['link', 'video', 'customButton']]
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
function deleteFile(src) {
$.ajax({
    data: {src : src},
    type: "POST",
    url: "{{ url('') }}/del_image",
    cache: false,
    success: function(resp) {
        console.log(resp);
    }
});
}
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
