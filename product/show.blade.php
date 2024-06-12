@extends('layouts.layouts')


@section('content')
    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        #main_image {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #main_image:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            margin-top: 70px;
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 1024px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <div class="super_container">
        <div class="single_product">
            <div class="container-fluid" style="background-color: #fff; padding: 11px;">
                <div class="row">
                    <div class="col-lg-6 order-lg-2 order-1">
                        @if ($product->model_url != '')
                            <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>
                            <model-viewer touch-action="pan-y" id="show-model" camera-controls
                                alt="{{ $product->sku }} - {!! $product->descrption !!}" class="image_selected"
                                style="margin-bottom: 10px;" src="/models/{{ $product->model_url }}" exposure="1"
                                shadow-intensity="6" shadow-softness="6">
                            </model-viewer>
                        @endif
                        <div class="image_selected image_wrapper"><img src="{{ $product->image_url }}"
                                alt="{{ $product->sku }} - {!! $product->descrption !!}" id="main_image">
                            @if ($product->category_id == 'Upcoming-Designs')
                                <div class="overlay">
                                    <img src="/images/comingsoon.png" />
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4 p-3 cursors"><img src="{{ $product->image_url }}"
                                    data-image-path="{{ $product->image_url }}" onclick='changeImage(this)'
                                    alt="{{ $product->type }}" class="img-fluid img-thumbnail"></div>

                            @foreach ($photos as $photo)
                                @if ($photo->photo_url != $product->image_url)
                                    <div class="col-md-2 col-4 p-3 cursors"><img src="{{ $photo->photo_url }}"
                                            data-image-path="{{ $photo->photo_url }}" onclick='changeImage(this)'
                                            alt="{{ $photo->alt_tag }}" class="img-fluid img-thumbnail"></div>
                                @endif
                            @endforeach
                        </div>
                        @if (count($allAssociatedProducts) > 0)
                            <div class="row mt-3 border-top pt-3">
                                <h2 class="fw-light">Associated or Similar Products</h2>
                                @foreach ($allAssociatedProducts as $associated)
                                    <div class="col-md-2 col-4 p-3 cursors border text-center">
                                        <a href="/enclosures/{{ $associated->sku }}.html"> <img
                                                src="{{ $associated->image_url }}" alt="{{ $associated->alt_tag }}"
                                                class="img-fluid" /><br />
                                            {{ $associated->sku }}</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 order-3">
                        <div class="product_description">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="/housings/{{ $product->category_id }}">{{ str_replace('-', ' ', $product->category_id) }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ $product->sku }}</li>
                                </ol>
                            </nav>
                            <div class="product_name">
                                <h1>{{ $product->name }}</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    @if ($product->category_id == 'Upcoming-Designs')
                                        <span class="product_price text-secondary">$65.45</span> for one 3-D printed sample.
                                    @elseif ($product->seller == "in-house")
                                    <span class="product_price text-secondary">${{ $product->msrp10 }}</span>
                                        each (min. 10pc).
                                        @else
                                        <span class="product_price text-secondary">${{ $product->msrp250 }}</span>
                                        each (min. 250pc).
                                    @endif
                                </div>
                                @if ($product->datasheet_url)
                                    <div class="col-md-6 text-end"><strong><a href="{{ $product->datasheet_url }}"
                                                class="btn btn-outline-secondary" target="_blank" class="text-secondary"><i
                                                    class="bi bi-file-earmark-arrow-down"></i> Download the Data Sheet
                                            </a></strong></div>
                                @endif
                            </div>
                            <hr class="singleline">
                            <div> <span class="product_info">{!! $product->description !!}</span>
                                <hr class="singleline">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Height:
                                            <span
                                                class="text-primary fw-bold">{{ number_format($product->height, 2, '.', ',') }}
                                                "</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Width:
                                            <span
                                                class="text-primary fw-bold">{{ number_format($product->width, 2, '.', ',') }}
                                                "</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Length:
                                            <span
                                                class="text-primary fw-bold">{{ number_format($product->length, 2, '.', ',') }}
                                                "</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Material:
                                            <span class="text-primary fw-bold">{{ $product->material }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Assembly:
                                            <span class="text-primary fw-bold">{{ $product->assembly }} </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            PCB Size:
                                            <span class="text-primary fw-bold">{{ $product->pcb_size }} </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            PCB Thickness:
                                            <span class="text-primary fw-bold">{{ $product->pcb_thickness }} </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            GTIN No.:
                                            <span class="text-primary fw-bold">{{ $product->gtin }} </span>
                                        </li>
                                    </ul>
                                </div>

                                <hr class="singleline">
                            </div>

                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="br-dashed">
                                            <div class="row">
                                                <div class="col-md-2 col-2 text-end">
                                                    <h1 class="text-warning"><i class="bi bi-tags-fill"></i></h1>
                                                </div>
                                                <div class="col-md-10 col-10">
                                                    <div class="pr-info"> <span class="break-all">Need less than 250 pieces?
                                                            <a href="/distributors.html">See our distributors</a> to
                                                            purchase smaller quantities.</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="br-dashed">
                                            <div class="row">
                                                <div class="col-md-2 col-2 text-end">
                                                    <h1 class="text-warning"><i class="bi bi-filetype-pdf"></i></h1>
                                                </div>
                                                <div class="col-md-10 col-10">
                                                    <div class="pr-info"> <span class="break-all">Need help figuring out
                                                            which enclosure you need?
                                                            <a href="https://www.newageenclosures.com/images/ecomm/products/files/361413_r4_0.pdf"
                                                                target="_blank">Download our buyer's guide!</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="singleline">
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col-xs-6" style="margin-left: 15px;"> <span
                                            class="product_options">Quantity
                                            Pricing</span><br>
                                        @if ($product->seller == "in-house")
                                        <badge class="btn btn-secondary  btn-sm"><strong>1</strong> -
                                            $64.45 ea
                                        </badge>  
                                        <badge class="btn btn-secondary  btn-sm"><strong>10</strong> -
                                            ${{ $product->msrp10 }} ea
                                        </badge> 
                                        <badge class="btn btn-secondary  btn-sm"><strong>25</strong> -
                                            ${{ $product->msrp25 }} ea
                                        </badge>   
                                        <badge class="btn btn-secondary  btn-sm"><strong>100</strong> -
                                            ${{ $product->msrp100 }} ea
                                        </badge><br />                                                                                                                                                              
                                        @endif                                            
                                        <badge class="btn btn-secondary  btn-sm"><strong>250</strong> -
                                            ${{ $product->msrp250 }} ea
                                        </badge>
                                        <badge class="btn btn-secondary btn-sm"><strong>500</strong> -
                                            ${{ $product->msrp500 }} ea
                                        </badge>
                                        <badge class="btn btn-secondary btn-sm"><strong>1,000</strong> -
                                            ${{ $product->msrp1000 }} ea
                                        </badge>
                                        <badge class="btn btn-secondary btn-sm"><strong>2,500</strong> -
                                            ${{ $product->msrp2500 }} ea
                                        </badge>
                                        <badge class="btn btn-secondary btn-sm"><strong>5,000</strong> -
                                            ${{ $product->msrp5000 }} ea
                                        </badge>
                                        <badge class="btn btn-secondary btn-sm"><strong>10,000</strong> -
                                            ${{ $product->msrp10000 }} ea
                                        </badge>

                                    </div>
                                </div>
                            </div>
                            <hr class="singleline">

                            <div class="row">
                                <form action="{{ route('create_cart') }}" method="GET">
                                    <div class="col-xs-6 mb-4">
                                        <div class="form-floating">
                                            <select name="quantity" class="form-select" onchange="updateUrl(this.value)">
                                                @if ($product->category_id == 'Upcoming-Designs')
                                                    <option value="1">
                                                        1pc - $65.45 (3D Printed Sample)
                                                    </option>
                                                @endif
                                                @if ($product->seller == "in-house")
                                                <option value="10">
                                                    10pc -
                                                    ${{ number_format($product->msrp10 * 10, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                                <option value="25">
                                                    25pc -
                                                    ${{ number_format($product->msrp25 * 25, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>  
                                                <option value="100">
                                                    100pc -
                                                    ${{ number_format($product->msrp100 * 100, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>                                                                                              
                                                @endif
                                                <option value="250">
                                                    250pc -
                                                    ${{ number_format($product->msrp250 * 250, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                                <option value="500">
                                                    500pc -
                                                    ${{ number_format($product->msrp500 * 500, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                                <option value="1000">
                                                    1,000pc -
                                                    ${{ number_format($product->msrp1000 * 1000, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                                <option value="2500">
                                                    2,500pc -
                                                    ${{ number_format($product->msrp2500 * 2500, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                                <option value="5000">
                                                    5,000pc -
                                                    ${{ number_format($product->msrp5000 * 5000, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                                <option value="10000">
                                                    10,000pc -
                                                    ${{ number_format($product->msrp10000 * 10000, 2, '.', ',') }}
                                                    @if ($product->category_id == 'Upcoming-Designs')
                                                        (Pre-Order)
                                                    @endif
                                                </option>
                                            </select>
                                            <label for="floatingSelect">Select a quantity</label>
                                        </div>
                                    </div>
                                    @php
                                        $userId = null;
                                        if(auth()->check()) {
                                            $userId = auth()->user()->id;
                                        }
                                    @endphp
                                    <div class="col-xs-6"><input type="hidden" name="product_id"
                                            value="{{ $product->id }}" /> <button type="submit"
                                            class="btn btn-success btn-lg mb-3"><i class="bi bi-cart-check-fill"></i> Add
                                            to cart</button>
                                        @if(auth()->check())
                                            <a href="/3d-configurator/frontend/?productId={{ $product->id }}&userId={{ $userId }}" id="customizedUrl" class="btn btn-primary btn-lg mb-3"><i
                                                class="bi bi-palette2"></i> Customize this enclosure</a>
                                        @else
                                            <a href="/3d-configurator/frontend/?productId={{ $product->id }}" id="customizedUrl" class="btn btn-primary btn-lg mb-3"><i
                                                class="bi bi-palette2"></i> Customize this enclosure</a>
                                        @endif

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center my-3">
            <h2 class="fw-light">Check out more from the <a
                    href="/housings/{{ $product->category_id }}" class="text-capitalize">{{ str_replace('-', ' ', $product->category_id) }}</a>
                category:</h2>
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ $product->image_url }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">SKU/Part No. {{ $product->sku }}</p>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/enclosures/{{ $product->url_key }}" class="btn btn-success">View
                                                Enclosure</a>
                                            <a href="/customize/{{ $product->url_key }}"
                                                class="btn btn-primary">Customize</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($more as $item)
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        @if (is_file(public_path($item->image_url)))
                                            <img src="{{ $item->image_url }}" class="card-img-top"
                                                alt="{{ $item->name }}" class="img-fluid">
                                        @else
                                            <img src="/images/noimage.png" class="card-img-top"
                                                alt="{{ $item->name }}" style="max-height: 206px; width: auto;"
                                                class="img-fluid">
                                        @endif

                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">SKU/Part No. {{ $item->sku }}</p>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/enclosures/{{ $item->url_key }}" class="btn btn-success">View
                                                    Enclosure</a>
                                                <a href="/customize/{{ $item->id }}"
                                                    class="btn btn-primary">Customize</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <div id="imgModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <script>
        (() => {
            const modelViewer = document.querySelector('#show-model');
            const time = performance.now();

            const animate = (now) => {
                modelViewer.exposure = oscillate(0, 2, 4000, now - time);
                requestAnimationFrame(animate);
            };

            animate();
        })();
    </script>
    <script>
        function updateUrl(quantity) {
            var productId = "{{ $product->id }}"; // Assuming $product->id is available in JavaScript
            var userId = "{{ $userId }}"; // Assuming $userId is available in JavaScript
            var url

            // Construct the URL with the selected quantity as a query parameter
            if(userId){
                url = "/3d-configurator/frontend/?productId=" + productId + "&userId=" + userId + "&quantity=" + quantity;
            }else{
                url = "/3d-configurator/frontend/?productId=" + productId + "&quantity=" + quantity;
            }

            // Update the href attribute of the button with the new URL
            document.getElementById('customizedUrl').href = url;
        }


        var modal = document.getElementById("imgModal");

        var img = document.getElementById("main_image");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    <script>
        function changeImage(obj) {
            var imagePath2 = obj.getAttribute('data-image-path');
            document.getElementById('main_image').src = imagePath2;
        }

        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>

@endsection
