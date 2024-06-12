@extends('layouts.layouts')

@section('content')

<div class="wrapper">
    <div class="form-left">
        <h2 class="text-uppercase">have an account?</h2>
        <p>
If you already have an account with us please use the button below to log in. Otherwise use the form to register for an account.       </p>

        <div class="form-field">
            <a href="/login" class="btn btn-outline-light btn-lg">Log in <i class="bi bi-power"></i></a>
        </div>
    </div>
        <form action="{{ route('store') }}" method="post" class="form-right">
        @csrf
        <h2 class="text-uppercase">Registration form</h2>
<div class="row">
    <div class="col-md-6 mb-3">
        <label>First Name</label>
        <input type="text" class="input-field @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label>Last Name</label>
        <input type="text" class="input-field @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}">
        @if ($errors->has('lname'))
            <span class="text-danger">{{ $errors->first('lname') }}</span>
        @endif
    </div>    
</div>
        <div class="mb-3">
            <label>Your Email</label>
            <input type="email" class="input-field @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label>Password</label>
                <input type="password" class="input-field @error('password') is-invalid @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="col-sm-6 mb-3">
                <label>Verify Password</label>
                <input type="password" class="input-field" id="password_confirmation" name="password_confirmation">
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
</div> 
<div class="container">
    <div class="row">
        <div class="col-md-6 text-end"><a href="/auth/google" class="btn  btn-outline-danger"><i class="bi bi-google"></i> Create an account using <b>Google</b> </a></div>
        <div class="col-md-6">
            <a href="/auth/facebook" class="btn  btn-outline-primary"><i class="bi bi-facebook"></i> Create an account  using <b>Facebook</b></a>
        </div>
    </div>
</div>   <div style="height: 150px;"></div>
@endsection