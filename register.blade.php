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
      @include('inc.header')
      <div class="wrapper">
        <div class="form-left">
            <h2 class="text-uppercase">have an account?</h2>
            <p>
    If you already have an account with us please use the button below to log in.        </p>
    
            <div class="form-field">
                <a href="/login" class="btn btn-outline-light btn-lg">Log in <i class="bi bi-power"></i></a>
            </div>
        </div>
        <form class="form-right">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" id="first_name" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label>Your Email</label>
                <input type="email" class="input-field" name="email" required>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="pwd" id="pwd" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Verify Password</label>
                    <input type="password" name="cpwd" id="cpwd" class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="/terms">Terms and Conditions</a>
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-field">
                <button type="submit" class="register" name="register">Register <i class="bi bi-person-add"></i> </button>
            </div>
        </form>
    </div>   <div style="height: 1000px;"></div>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>		
    </body>
</html>
