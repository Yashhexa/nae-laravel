
    <div class="row">
<div class="col-md-12 pt-3">
<h1 class="text-success fw-light"><i class="bi bi-box-arrow-up-right"></i> Enter the URL for the remote page</h1>
<form action="{{ route('remote') }}" method="post" enctype="multipart/form-data" class="form mt-5 needs-validation" novalidate>
    @csrf
    <div class="row">                
        <div class="col-md-6">
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
            </div>    
            <div class="col-md-6">                  
            <label id="parent_page_label" class="text-info">Parent Page</label>

            <select class="form-select mb-3" name="parent_id" aria-label="Select parent page">
                <option selected value="0">Select a parent page</option>
                @foreach ($pages as $page)
                    <option value="{{ $page->page_id }}">{{ $page->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="col-md-12">
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
            <div class="col-md-12">
                <label id="page_url_label" class="text-info">External page link <a href="#" data-bs-toggle="tooltip"
                    data-bs-title="Enter in the external link."><i
                        class="bi bi-question-circle-fill text-success"></i></a></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-box-arrow-up-right"></i></span>
                            <input type="text" class="form-control" id="external_url" name="external_url" placeholder="Page URL..." required>
                            <div class="invalid-tooltip">
                                Please enter a URL for the external page.
                            </div>
                        </div> 
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="in_menu" value="Yes" id="flexCheckDefault" checked>
                            <label id="url_key" class="text-info">Include this page on the menu<a href="#" data-bs-toggle="tooltip"
                                data-bs-title="Checking this checkbox will automatically place this page on your website's menu."><i
                                    class="bi bi-question-circle-fill text-success"></i></a></label>
                        </div>                       
                           <button type="submit" class="btn btn-success btn-lg mt-3 float-end"><i class="bi bi-file-earmark-plus"></i> Add Page</button>

                    </div>


       </div>
</form>
</div>
    </div>