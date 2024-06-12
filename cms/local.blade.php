
    <div class="row">
        <div class="col-md-12 mt-3"><h1 class="text-success"><i class="bi bi-file-earmark-plus"></i> Add a new page</h1></div>
        <div class="col-md-12">
            <form action="{{ route('savepage') }}" method="post" enctype="multipart/form-data" class="form mt-5 needs-validation" novalidate>
                @csrf
               <div class="row">
                <div class="col-md-3">
                    <a href="#" data-bs-toggle="modal" class="image" data-bs-target="#showTemplate"><img src="{{ asset('images/welcome.png') }}" id="canvas" class="img-fluid" /></a>
                </div>                    
                <div class="col-md-9">
                    <label for="validationTooltip01"  id="sort_label" class="text-info">Sort Order <a href="#" data-bs-toggle="tooltip"
                        data-bs-title="A number representing the order in which this page will be displayed on the menu structure."><i
                            class="bi bi-question-circle-fill text-success"></i></a></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                        <input type="text" name="sort" class="form-control" aria-label="Sort order on the menu." required>
                        <div class="invalid-tooltip">
                            Must enter the sort order for this page on the menu.
                          </div>
                       </div>                        
                    <label id="template" class="text-info">Select Template</label>

                    <select class="form-select mb-3" name="template" aria-label="Select parent page" onchange="displayImage(this);" required>
                        <option selected value="">Select a template...</option>
                        @foreach ($templates as $template)
                            <option value="{{ str_replace('templates/','',$template) }}">{{ str_replace('templates/','',$template) }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-tooltip">
                        Please select a template for this page.
                    </div>
                    <label id="parent_page_label" class="text-info">Parent Page</label>

                    <select class="form-select mb-3" name="parent_id" aria-label="Select parent page">
                        <option selected value="0">Select a parent page</option>
                        @foreach ($pages as $page)
                            <option value="{{ $page->page_id }}">{{ $page->name }}</option>
                        @endforeach
                    </select>
                    <label id="page_title_label" class="text-info">Menu Name <a href="#" data-bs-toggle="tooltip"
                            data-bs-title="This is the name that will be displayed as the menu item on your navigation."><i
                                class="bi bi-question-circle-fill text-success"></i></a></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-menu-button-wide-fill"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="menu name..." required>
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
                        placeholder="Enter title..." required>
                        <div class="invalid-tooltip">
                            Please enter a title for this page.
                        </div>
                </div>
                <label id="page_desc" class="text-info">Page Description</label>
                <div class="form-floating">
                    <textarea name="page_desc" style="min-height: 120px;" placeholder="Add description for this page..."
                        class="form-control mb-3" required></textarea>
                        <div class="invalid-tooltip">
                            Please add a description for this page.
                        </div>
                </div>
             <label id="url_key" class="text-info">URL Key <a href="#" data-bs-toggle="tooltip"
                data-bs-title="This is the URL that will be displayed in the browser bar."><i
                    class="bi bi-question-circle-fill text-success"></i></a></label>
                <div class="input-group mt-3">
                    
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-link-45deg"></i></span>
                    <input type="text" class="form-control" id="url-key" name="url_key" placeholder="ex.(mypage.html)" required>
                    <div class="invalid-tooltip">
                        Please enter a URL key for this page.
                    </div>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
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
                <button type="submit" class="btn btn-success btn-lg mt-3 float-end"><i class="bi bi-file-earmark-plus"></i> Add Page</button>
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
