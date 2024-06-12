<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Age Enclosures</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    @php
        $nav = App\Http\Controllers\Menu::SetMenu();
        //echo "<pre>"; print_r($nav); echo "</pre>"; exit;
    @endphp
    <div class="container-fluid top-bar">
        <div class="row">
            <div class="col-6">
                <ul class="nav justify-content-start">
                    <li class="nav-item"><a class="nav-link" href="tel:855-426-3625"><strong><i
                                    class="bi bi-telephone-fill"></i> CALL US (855) 4NA-ENCL</strong></a></li>
                    <li class="nav-item"><a class="nav-link text-success"
                            href="mailto:customerservice@newageenclosures.com"><i class="bi bi-envelope-fill"></i> Email
                            us</a></li>

                </ul>
            </div>
            <div class="col-6">
                <ul class="nav justify-content-end">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="/login"><i class="bi bi-power"></i> Log in</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register"><i class="bi bi-pencil-square"></i>
                                Register </a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cart"></i> My Cart</a></li>
                        <li class="nav-item"><a class="nav-link text-success" href="#">Welcome
                                <strong>{{ Auth::user()->name }}</strong>!</a></li>
                        <li class="nav-item"><a class="nav-link" href="/dashboard"><i class="bi bi-person-bounding-box"></i>
                                My Account</a></li>
                        <li class="nav-item"><a class="nav-link">
                                <form id="logout-form" style="padding: 0%; margin:0%;" action="{{ route('logout') }}"
                                    method="POST">
                                    <button class="btn btn-outline-success logout" type="submit">Log Out</button>
                                    @csrf
                                </form>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-light sticky-top" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-transparent.png') }}" width="170"
                    height="75" class="img-fluid" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    @foreach ($nav as $item)
                        @if (!is_array($item[1]))
                            <li class="nav-item">
                                <a class="nav-link" href="/{{ $item[1] }}">{{ $item[0] }}</a>
                            </li>
                        @elseif(is_array($item[1]))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">{{ $item[0] }} </a>
                                <div class="dropdown-menu">
                                    @foreach ($item[1] as $nav_item)
                                        <a class="dropdown-item" href="/{{ $nav_item[1] }}"> {{ $nav_item[0] }}</a>
                                    @endforeach

                                </div>
                            </li>
                        @endif
                    @endforeach
            </div>
            </ul>
            <a href="/quote" class="btn btn-success">Get an instant quote <i class="bi bi-bag-check"></i></a>
        </div>
        </div>
    </nav>

    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::get('message') !!}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert {{ Session::get('alert-class', 'alert-danger') }}">{!! Session::get('error') !!}</div>
    @endif

    <div class="container">
        @yield('content')
    </div>



    <div class="container-fluid footer mt-5">
        <div class="row">
            <div class="col-md-3">fsf</div>
            <div class="col-md-3">fsf</div>
            <div class="col-md-2">fsf</div>
            <div class="col-md-2">fsf</div>
            <div class="col-md-2">fsf</div>
        </div>
    </div>
    <div class="container-fluid bottom-footer">
        <div class="row">
            <div class="col-md-6">fsf</div>
            <div class="col-md-4">fsf</div>
            <div class="col-md-2">fsf</div>
        </div>
    </div>

   
    <script id="rendered-js">
        $(document).ready(function() {


            //----------Select the first tab and div by default

            $('#vertical_tab_nav > ul > li > a').eq(0).addClass("selected");
            $('#vertical_tab_nav > div > article').eq(0).css('display', 'block');


            //---------- This assigns an onclick event to each tab link("a" tag) and passes a parameter to the showHideTab() function

            $('#vertical_tab_nav > ul').click(function(e) {

                if ($(e.target).is("a")) {

                    /*Handle Tab Nav*/
                    $('#vertical_tab_nav > ul > li > a').removeClass("selected");
                    $(e.target).addClass("selected");

                    /*Handles Tab Content*/
                    var clicked_index = $("a", this).index(e.target);
                    $('#vertical_tab_nav > div > article').css('display', 'none');
                    $('#vertical_tab_nav > div > article').eq(clicked_index).fadeIn();

                }

                $(this).blur();
                return false;

            });


        }); //end ready

        /* if in drawer mode */
        $(".tab_drawer_heading").click(function() {

            $("article").hide();
            var d_activeTab = $(this).attr("rel");
            $("#" + d_activeTab).fadeIn();

            $(".tab_drawer_heading").removeClass("d_active");
            $(this).addClass("d_active");

            $("ul.tabs li a").removeClass("selected");
            $("ul.tabs li a[rel^='" + d_activeTab + "']").addClass("selected");
        });
        //# sourceURL=pen.js
    </script>
</body>

</html>
