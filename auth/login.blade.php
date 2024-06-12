@extends('layouts.layouts')

@section('content')

<div class="wrapper">
    <div class="form-left">
        <h2 class="text-uppercase">Don't have an account?</h2>
        <p>
If you don't have an account please register by clicking the button below.        </p>

        <div class="form-field">
            <a href="/register" class="btn btn-outline-light btn-lg">Register <i class="bi bi-person-add"></i></a>
        </div>
    </div>
    <form action="{{ route('authenticate') }}" method="post" class="form-right">
        @csrf
        <h2 class="text-uppercase">Login</h2>
        <div class="mb-3">
            <label>Your Email</label>
            <input type="email" class="input-field @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12 mb-6">
                <label>Password</label>
                <input type="password" class="input-field @error('password') is-invalid @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
<div class="col-md-12 text-center">
Forgot your password? <a href="/password/reset">Click here</a>.
</div>
        </div>

        <div class="form-field pt-5">
            <button type="submit" class="register" name="register">Log In <i class="bi bi-power"></i></button>
            
        </div>

    </form>
</div> 
<div class="container">
    <div class="row">
        <div class="col-md-6 text-end"><a href="/auth/google" class="btn  btn-outline-danger"><i class="bi bi-google"></i> Login using <b>Google</b> </a></div>
        <div class="col-md-6">
            <a href="/auth/facebook" class="btn  btn-outline-primary"><i class="bi bi-facebook"></i> Login using <b>Facebook</b></a>
        </div>
    </div>
</div><div style="height: 150px;"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection