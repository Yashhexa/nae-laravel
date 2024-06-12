@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12 mt-5">
                <form action="{{ route('addnewuser') }}" method="post" class="form needs-validation" novalidate>
                    @csrf
                    <h2 class="text-success"><i class="bi bi-person-add"></i> Add a new user</h2>
                    <div class="mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Name" required>
                                @if ($errors->has('name'))
                                <div class="invalid-tooltip">{{ $errors->first('name') }}</div>
                                @endif
                        </div>
                    </div>
                    <div class="mb-3  input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Email">
                        @if ($errors->has('email'))
                        <div class="invalid-tooltip">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                <div class="invalid-tooltip">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Verify Password">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group has-validation">
                            <label class="input-group-text"><i class="bi bi-shield-shaded"></i></label>
                            <select name="level" class="form-select @error('level') is-invalid @enderror" id="level">
                                <option value="">--Select a level--</option>
                                <option value="0">Administrator</option>
                                <option value="1">Blog Manager</option>
                                <option value="2">E-Commerce Manager</option>
                                <option value="3">Customer/User</option>
                            </select>
                            <span class="input-group-text">User Level</span>
                            @if ($errors->has('level'))
                            <div class="invalid-tooltip">{{ $errors->first('level') }}</div>
                            @endif                            
                        </div>
                    </div>
                    <div class="form-field">
                        <button type="submit" class="btn btn-success btn-lg float-end" name="register"><i
                                class="bi bi-person-add"></i> Add User </button>

                    </div>
                </form>
            </div>
        </div>

    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
