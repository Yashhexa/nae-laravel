<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript">
      (function(c,l,a,r,i,t,y){
          c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
          t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
          y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
      })(window, document, "clarity", "script", "lxnb2bv6bo");
  </script>
    <style>
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
@media (max-width: 767px) {
  #featureContainer .carousel-inner .carousel-item > div {
    display: none;
  }
  #featureContainer .carousel-inner .carousel-item > div:first-child {
    display: block;
  }
}
#featureContainer .carousel-inner .carousel-item.active,
#featureContainer .carousel-inner .carousel-item-next,
#featureContainer .carousel-inner .carousel-item-prev {
  display: flex;
}
@media (min-width: 768px) {
  
  #featureContainer .carousel-inner .carousel-item-end.active,
  #featureContainer .carousel-inner .carousel-item-next {
    transform: translateX(25%);
  }
  #featureContainer .carousel-inner .carousel-item-start.active, 
  #featureContainer .carousel-inner .carousel-item-prev {
    transform: translateX(-25%);
  }
  #featureContainer .card img{
    width: 90%;
    height: auto;
  }
  #featureContainer .carousel-item{
    justify-content: space-between;
  }
}
@media (max-width: 767px) {
  #featureContainer .card img{
    width: 100%;
    height: auto;
  }
}
#featureContainer .carousel-inner .carousel-item-end,
#featureContainer .carousel-inner .carousel-item-start { 
  transform: translateX(0);
}
#featureContainer .card{
  border: 0;
}
#featureContainer .card{
  position: relative;
}
#featureContainer .card .card-img-overlays{
  position: absolute;
  bottom: 15%;
  left: 10%;
}
#featureContainer a{
  text-decoration: none;
}
#featureContainer .indicator{
  border: 0px solid rgb(202, 202, 202);
  padding: 3px 6px 3px 6px;
}
#featureContainer .indicator:hover{
  background-color: #7ba62b;
  border: 1px solid #7ba62b;
  transition: 200ms;
}
#featureContainer .indicator:hover{
  color: white;
  transition: 200ms;
}
#featureContainer .indicator {
  color: lightgray;
}
#featureContainer .float-end{
  padding-top: 10px;
}        
    </style>        
    @meta_tags
    {!! RecaptchaV3::initJs() !!}
</head>

<body class="antialiased">
    @php
        $nav = App\Http\Controllers\Menu::SetMenu();
        $cats = App\Http\Controllers\Menu::CatMenu();
        if(Session::get('cart_id')){
            $cart_id = Session::get('cart_id');
        }else{
            $cart_id = 0;
        }
        //echo "<pre>"; $session; echo "</pre>"; exit;
    @endphp
    <div class="container-fluid top-bar">
<nav>        
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
                        <li class="nav-item"><a class="nav-link" href="/cart/{{$cart_id}}"><i class="bi bi-cart"></i> My Cart
                        @if(isset($item_count))
                        <span class="badge bg-warning rounded-pill">{{$item_count}}</span>
                        @endif
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="/login"><i class="bi bi-power"></i> Log in</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register"><i class="bi bi-pencil-square"></i> Register </a></li>
                        
                    @else
                        <li class="nav-item"><a class="nav-link" href="/cart/{{$cart_id}}"><i class="bi bi-cart"></i> My Cart
                            @if(isset($item_count))
                            <span class="badge bg-warning rounded-pill">{{$item_count}}</span>
                            @endif                        
                        </a></li>
                        <li class="nav-item"><a class="nav-link text-success" href="#">Welcome
                                <strong>{{ Auth::user()->name }}</strong>!</a></li>
                        <li class="nav-item"><a class="nav-link" href="/dashboard"><i class="bi bi-person-bounding-box"></i>
                                My Account</a></li>
                        <li class="nav-item"><a class="nav-link">
                                <form id="logout-form" style="padding: 0%; margin:0%; margin-top: -2px;" action="{{ route('logout') }}"
                                    method="POST">
                                    <button class="btn btn-outline-success logout" type="submit">Log Out</button>
                                    @csrf
                                </form></a>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
       
    </div>
    <nav class="navbar navbar-expand-lg bg-light sticky-top" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-transparent.png') }}" width="170"
                    height="75" class="img-fluid" alt="New Age Enclosures logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                      aria-haspopup="true" aria-expanded="false">Enclosures &amp; Accessories</a>
                  <div class="dropdown-menu">
                      @foreach ($cats as $cat)
                          <a class="dropdown-item" href="/housings/{{ $cat[1] }}"> {{ $cat[0] }}</a>
                      @endforeach

                  </div>
              </li>                
                    @foreach ($nav as $item)
                        @if (!is_array($item[1]))
                        <a class="nav-link" href="/{{ $item[1] }}">
                            @if (Request::getRequestUri() == "/".$item[1])
                            <span class="text-success fw-bold">{{ $item[0] }}</span>
                            @else
                            {{ $item[0] }}
                            @endif</a>
                        @elseif(is_array($item[1]))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">{{ $item[0] }} </a>
                                <div class="dropdown-menu">
                                    @foreach ($item[1] as $nav_item)
                                    <a class="dropdown-item" href="/{{ $nav_item[1] }}"> 
                                        @if (Request::getRequestUri() == "/".$nav_item[1])
                                        <span class="text-success fw-bold">{{ $nav_item[0] }}</span>
                                        @else
                                        {{ $nav_item[0] }}
                                        @endif                                            
                                    </a>
                                    @endforeach

                                </div>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
            <a href="/tool.html" class="btn btn-success">Custom Enclosures <i class="bi bi-tools"></i></a>
        </div>
        </div>
    </nav>
</nav> 
    @if (Session::has('message'))
        <div class="alert  alert-dismissible fade show {{ Session::get('alert-class', 'alert-success') }}" role="alert"><strong><i class="bi bi-hand-thumbs-up"></i> {!! Session::get('message') !!} </strong> <button type="button" class="btn-close alert-dismissible"  data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if (Session::has('error'))
        <div class="alert  alert-dismissible fade show {{ Session::get('alert-class', 'alert-danger') }}" role="alert"><strong><i class="bi bi-exclamation-circle"></i> {!! Session::get('error') !!} </strong> <button type="button" class="btn-close alert-dismissible"  data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
<main>
    @yield('content')
<div class="container">
    <div class="col-md-12 border-top mt-3">
        <div class="container my-3 mt-5" id="featureContainer">
            <div class="row mx-auto my-auto justify-content-center">
              <div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">

                <div class="float-end pe-md-4">
                  <a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
                    <i class="bi bi-arrow-left-circle"></i>
                  </a> &nbsp;&nbsp;
                  <a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
                    <i class="bi bi-arrow-right-circle"></i>
                  </a>
                </div>

                <div class="carousel-inner" role="listbox">
@php
    $set = "active";
    $userId = null;
    if(auth()->check()) {
        $userId = auth()->user()->id;
    }
@endphp                    
@foreach ($more as $item)
<div class="carousel-item {{$set}}">
    <div class="col-md-3">
        <div class="card" >
            <a href="/enclosures/{{$item->url_key}}">
              @if (is_file(public_path($item->image_url))) 
              <img src="{{$item->image_url}}" style="max-height: 186px;" class="card-img-top" alt="{{$item->name}}">
              @else
              <img src="/images/noimage.png" style="max-height: 186px;" class="card-img-top" alt="{{$item->name}}">
                
              @endif</a>
          <div class="card-body">
            <h5 class="card-title">{{$item->name}}</h5>
            <p class="card-text">SKU/Part No. {{$item->sku}}</p>
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/enclosures/{{$item->url_key}}" class="btn btn-success">View Enclosure</a>
            @if(auth()->check())
                <a href="/3d-configurator/frontend/?productId={{ $item->id }}&userId={{ $userId }}" class="btn btn-primary">Customize</a>
            @else
                <a href="/3d-configurator/frontend/?productId={{ $item->id }}" class="btn btn-primary">Customize</a>
            @endif
            </div>
          </div>
        </div>
                            </div>
  </div>  
  @php
  if($set == "active"){
      $set = "";
  }
@endphp    
@endforeach

                </div>
              </div>
            </div>
          </div>
    </div>     
</div>
</main>    
<footer>
  <div class="container mt-5 border-top"><div class="row">
    <!-- Begin Constant Contact Inline Form Code -->
  <div class="ctct-inline-form" data-form-id="a71d6344-3f38-440d-bcec-56447861e3a2"></div>
  <!-- End Constant Contact Inline Form Code -->
  </div></div>
 <div class="container-fluid footer mt-5 pt-2 pb-3">
        <div class="row">
            <div class="col-md-2 col-12 pt-4"><a href="/"><img
                        src="{{ asset('images/logo-transparent.png') }}" class="img-fluid"
                        alt="New Age Enclosures logo." /></a>

            </div>
            <div class="col-md-4 col-12 p-3 text-body-tertiary">
                <div class="row">
                    <h1 class="fw-normal text-success">(855) 4NA-ENCL</h1>
                    <div class="col-md-2 col-2"><a href="/"><img src="{{ asset('images/logo_asq_sm.gif') }}"
                                alt="logo asq" /></a></div>
                    <div class="col-md-2 col-2"><a href="/"><img
                                src="{{ asset('images/logo_iso_9001_sm.gif') }}" alt="logo iso 9001" /></a></div>
                    <div class="col-md-2 col-2"><a href="/"><img src="{{ asset('images/logo_rohs_sm.gif') }}"
                                alt="logo rohs" /></a></div>
                    <div class="col-md-2 col-2"><a href="/"><img src="{{ asset('images/logo_sme_sm.gif') }}"
                                alt="logo sme" /></a></div>
                    <div class="col-md-2 col-2"><a href="/"><img src="{{ asset('images/logo_spe_sm.gif') }}"
                                alt="logo spe" /></a></div>
                    <div class="col-md-2 col-2"></div>
                </div>
            </div>
            <div class="col-md-2 col-4">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-light"><a href="/">Home</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/about-us.html">About Us</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/all">Enclosures</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/tool.html">Configurator Tool</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/services.html">Services</a></li>
              </ul>
          </div>
          <div class="col-md-2 col-4">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-light"><a href="/distributors.html">Distributors</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/markets.html">Markets Served</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/faq.html">F.A.Q.</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/associations.html">Associations</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/1708964802">Buyer's Guide</a></li>
              </ul>

          </div>
          <div class="col-md-2 col-4">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-light"><a href="/blog">Blog</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/certifications.html">Certifications</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/white-papers.html">White Papers</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/videos.html">Videos</a></li>
                  <li class="list-group-item list-group-item-light"><a href="/contact">Contact Us</a></li>
              </ul>
          </div>
        </div>
    </div>
    <div class="container-fluid bottom-footer">
        <div class="row">
            <div class="col-6 fw-lighter text-start">Made in the U.S.A. <img src="{{ asset('images/usa.png') }}" alt="Made in the USA" />
                - 2240 S. Thornburg Street Santa Maria, California 93455 </div>
            <div class="col-6 fw-lighter text-end">Copyright &copy; <?php echo date('Y'); ?> New Age Enclosures</div>
        </div>
    </div>
</footer>


<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/65d66e559131ed19d96f9de8/1hn6ptv8r';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
<script>
let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
myCarousel.forEach((el) => {
  const minPerSlide = 4
  let next = el.nextElementSibling
  for (var i=1; i<minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = myCarousel[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
  }
})
</script> 
<!-- Begin Constant Contact Active Forms -->
<script> var _ctct_m = "e129ce13aee584e91d62f6356c85b98d"; </script>
<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
<!-- End Constant Contact Active Forms -->   
</body>

</html>
