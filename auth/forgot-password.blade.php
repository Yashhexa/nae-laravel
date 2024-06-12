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
    <form action="{{ route('password.request') }}" method="post" class="form-right">
        @csrf
        <h2 class="text-uppercase">Enter your email to reset your password.</h2>
        <div class="mb-3">
            <label>Your Email</label>
            <input type="email" class="input-field @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-field pt-5">
            <button type="submit" class="register" name="register">Reset Password <i class="bi bi-power"></i></button>
            
        </div>

    </form>
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection