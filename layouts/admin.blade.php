<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @meta_tags
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript">
        function displayImage(elem) {
            var image = document.getElementById("canvas");
            image.src = "/images/" + elem.value + ".png";
            template_image.src = "/images/" + elem.value + ".template.png";
        }
    </script>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css'>
</head>

<body class="antialiased">
    
    <nav class="navbar navbar-expand-lg navbar bg-dark border-bottom border-body sticky-top mb-2" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-transparent-dk.png') }}" width="170"
                    height="75" class="img-fluid" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Content Pool</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/add">Add a Page</a>
                            <a class="dropdown-item" href="/pages">Manage Pages</a>
                            <a class="dropdown-item" href="/blog/add">Add Blog Post</a>
                            <a class="dropdown-item" href="/blog/list">Manage Blog Posts</a>
                            <a class="dropdown-item" href="/blog/categories/new">Add Blog Category</a>
                            <a class="dropdown-item" href="/blog/categories/manage">Manage Blog Categories</a>
                            <a class="dropdown-item" href="/showmedia">Media</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Users</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/adduser">Add a User</a>
                            <a class="dropdown-item" href="/users">Manage Users</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">E-Commerce</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/orders">Orders</a>
                            <a class="dropdown-item" href="/list?page=1&keyword=&cat_id=">Products</a>
                            <a class="dropdown-item" href="/enclosures/create">Add Product</a>
                            <a class="dropdown-item" href="/categories">Manage Categories</a>
                            <a class="dropdown-item" href="/categories/create">Add Category</a>
                            <a class="dropdown-item" href="/attributes">Manage Attributes</a>
                            <a class="dropdown-item" href="/attributes/create">Add Attribute</a>
                            <a class="dropdown-item" href="/promo/add">Add Discount Code</a>
                            <a class="dropdown-item" href="/promo/manage">Manage Discount Codes</a>
                            <a class="dropdown-item" href="/import">Import Products</a>
                            <a class="dropdown-item" href="/prices">Update Prices</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">CRM</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/companies">View Companies</a>
                            <a class="dropdown-item" href="/companies/create">Add Company</a>
                            <a class="dropdown-item" href="/contacts">View Contacts</a>
                            <a class="dropdown-item" href="/contacts/create">Add Contact</a>  
                            <a class="dropdown-item" href="/deals">View Deals</a>
                            <a class="dropdown-item" href="/deals/create">Add a Deal</a>
                            <a class="dropdown-item" href="/tasks">View Tasks</a>
                            <a class="dropdown-item" href="/tasks/create">Add a Task</a>                                                                                     
                        </div>
                    </li>                    

                </ul>

            </div>
            <form id="logout-form" style="padding: 0%; margin:0%; margin-top: -2px;" action="{{ route('logout') }}"
            method="POST">
            <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-power"></i> Log Out</button>
            @csrf
        </form>            
        </div>
    </nav>

    @if (Session::has('message'))
        <div class="alert fw-bold {{ Session::get('alert-class', 'alert-success alert alert-dismissible fade show') }}"><i class="bi bi-hand-thumbs-up"></i> {!! Session::get('message') !!} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if (Session::has('success'))
    <div class="alert fw-bold {{ Session::get('alert-class', 'alert-success alert alert-dismissible fade show') }}"><i class="bi bi-hand-thumbs-up"></i> {!! Session::get('success') !!} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
@endif
    @if (Session::has('error'))
        <div class="alert fw-bold {{ Session::get('alert-class', 'alert-danger alert alert-dismissible fade show') }}"><i class="bi bi-exclamation-triangle"></i> {!! Session::get('error') !!} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if (Session::has('info'))
        <div class="alert fw-bold {{ Session::get('alert-class', 'alert-info alert alert-dismissible fade show') }}"><i class="bi bi-info-circle"></i> {!! Session::get('info') !!} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif


    @yield('content')


    <div class="container-fluid footer mt-5">
        <div class="row">
            <div class="col-md-3 p-3"><a href="/"><img src="{{ asset('images/logo-transparent.png') }}"
                        class="img-fluid" /></a><br />
            </div>


        </div>
    </div>
    <div class="container-fluid bottom-footer">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 text-end">Copyright © <?php echo date('Y'); ?> New Age Enclosures</div>
        </div>
    </div>

    
</body>

</html>
