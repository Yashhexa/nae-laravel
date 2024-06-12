<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Age Enclosures</title>
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
    </head>
    <body class="antialiased"><div class="container-fluid top-bar">
<div class="row">
    <div class="col-md-6">
        <ul class="nav justify-content-start">
            <li class="nav-item"><a class="nav-link" href="tel:855-426-3625"><strong><i class="bi bi-telephone-fill"></i> CALL US (855) 4NA-ENCL</strong></a></li>
                <li class="nav-item"><a class="nav-link text-success" href="mailto:customerservice@newageenclosures.com"><i class="bi bi-envelope-fill"></i> Email us</a></li>

        </ul>
    </div>    
<div class="col-md-6">
    <ul class="nav justify-content-end">
        @guest
        <li class="nav-item"><a class="nav-link" href="/login"><i class="bi bi-power"></i> Log in</a></li>
        <li class="nav-item"><a class="nav-link" href="/register"><i class="bi bi-pencil-square"></i> Register </a></li>         
       @else 
  <li class="nav-item"><a class="nav-link" href="/dashboard"><i class="bi bi-person-bounding-box"></i> My Account</a></li>
  @endguest
  <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cart"></i></a></li>
      </ul>
</div>
</div>
  </div>      
<nav class="navbar navbar-expand-lg bg-light sticky-top" data-bs-theme="light">
<div class="container-fluid">
<a class="navbar-brand" href="/"><img src="{{ asset('images/logo-transparent.png') }}" width="170" height="75" class="img-fluid" /></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarColor01">
  <ul class="navbar-nav me-auto">
    <li class="nav-item">
      <a class="nav-link active" href="/">Home
        <span class="visually-hidden">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/about">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/enclosures">Enclosures</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/distributors">Distributors</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Customize</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Services</a>
        <a class="dropdown-item" href="#">Design Ideas</a>
      </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Resources</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Buyer's Guide</a>
          <a class="dropdown-item" href="#">F.A.Q.</a>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="/contact">Contact Us</a>
      </li>         
  </ul>
  <a href="/quote" class="btn btn-success">Get an instant quote <i class="bi bi-bag-check"></i></a>
</div>
</div>
</nav>	