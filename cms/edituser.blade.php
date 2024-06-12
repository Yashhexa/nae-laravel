@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12 mt-5">
                <form action="{{ route('saveuser') }}" method="post" class="form needs-validation" novalidate>
                    @csrf
                    <h2 class="text-success"><i class="bi bi-person-gear"></i> Edit: <span class="text-primary">{{ $user[0]->name }}</span></h2>
                    <div class="mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ $user[0]->name }}" name="name" placeholder="Name" required>
                            @if ($errors->has('name'))
                                <div class="invalid-tooltip">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3  input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $user[0]->email }}" placeholder="Email">
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
                    <div class="mb-3  input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-signpost-2"></i></span>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $user[0]->address }}" placeholder="Address">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 input-group">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-signpost-2"></i></span>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ $user[0]->city }}" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 input-group">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-signpost-2"></i></span>
                                <select id="state" name="state" class="form-select">
                                    <option value="">---</option>
                                    <option value="Alabama" @if($user[0]->state == "Alabama") selected @endif>Alabama</option>
                                    <option value="Alaska" @if($user[0]->state == "Alaska") selected @endif>Alaska</option>
                                    <option value="Arizona" @if($user[0]->state == "Arizona") selected @endif>Arizona</option>
                                    <option value="Arkansas" @if($user[0]->state == "Arkansas") selected @endif>Arkansas</option>
                                    <option value="California" @if($user[0]->state == "California") selected @endif>California</option>
                                    <option value="Colorado" @if($user[0]->state == "Colorado") selected @endif>Colorado</option>
                                    <option value="Connecticut" @if($user[0]->state == "Connecticut") selected @endif>Connecticut</option>
                                    <option value="Delaware" @if($user[0]->state == "Delaware") selected @endif>Delaware</option>
                                    <option value="District of Columbia" @if($user[0]->state == "District of Columbia") selected @endif>District of Columbia</option>
                                    <option value="Florida" @if($user[0]->state == "Florida") selected @endif>Florida</option>
                                    <option value="Georgia" @if($user[0]->state == "Georgia") selected @endif>Georgia</option>
                                    <option value="Guam" @if($user[0]->state == "Guam") selected @endif>Guam</option>
                                    <option value="Hawaii" @if($user[0]->state == "Hawaii") selected @endif>Hawaii</option>
                                    <option value="Idaho" @if($user[0]->state == "Idaho") selected @endif>Idaho</option>
                                    <option value="Illinois" @if($user[0]->state == "Illinois") selected @endif>Illinois</option>
                                    <option value="Indiana" @if($user[0]->state == "Indiana") selected @endif>Indiana</option>
                                    <option value="Iowa" @if($user[0]->state == "Iowa") selected @endif>Iowa</option>
                                    <option value="Kansas" @if($user[0]->state == "Kansas") selected @endif>Kansas</option>
                                    <option value="Kentucky" @if($user[0]->state == "Kentucky") selected @endif>Kentucky</option>
                                    <option value="Louisiana" @if($user[0]->state == "Louisiana") selected @endif>Louisiana</option>
                                    <option value="Maine" @if($user[0]->state == "Maine") selected @endif>Maine</option>
                                    <option value="Maryland" @if($user[0]->state == "Maryland") selected @endif>Maryland</option>
                                    <option value="Massachusetts" @if($user[0]->state == "Massachusetts") selected @endif>Massachusetts</option>
                                    <option value="Michigan" @if($user[0]->state == "Michigan") selected @endif>Michigan</option>
                                    <option value="Minnesota" @if($user[0]->state == "Minnesota") selected @endif>Minnesota</option>
                                    <option value="Mississippi" @if($user[0]->state == "Mississippi") selected @endif>Mississippi</option>
                                    <option value="Missouri" @if($user[0]->state == "Missouri") selected @endif>Missouri</option>
                                    <option value="Montana" @if($user[0]->state == "Montana") selected @endif>Montana</option>
                                    <option value="Nebraska" @if($user[0]->state == "Nebraska") selected @endif>Nebraska</option>
                                    <option value="Nevada" @if($user[0]->state == "Nevada") selected @endif>Nevada</option>
                                    <option value="New Hampshire" @if($user[0]->state == "New Hampshire") selected @endif>New Hampshire</option>
                                    <option value="New Jersey" @if($user[0]->state == "New Jersey") selected @endif>New Jersey</option>
                                    <option value="New Mexico" @if($user[0]->state == "New Mexico") selected @endif>New Mexico</option>
                                    <option value="New York" @if($user[0]->state == "New York") selected @endif>New York</option>
                                    <option value="North Carolina" @if($user[0]->state == "North Carolina") selected @endif>North Carolina</option>
                                    <option value="North Dakota" @if($user[0]->state == "North Dakota") selected @endif>North Dakota</option>
                                    <option value="Northern Marianas Islands" @if($user[0]->state == "Northern Marianas Islands") selected @endif>Northern Marianas Islands</option>
                                    <option value="Ohio" @if($user[0]->state == "Ohio") selected @endif>Ohio</option>
                                    <option value="Oklahoma" @if($user[0]->state == "Oklahoma") selected @endif>Oklahoma</option>
                                    <option value="Oregon" @if($user[0]->state == "Oregon") selected @endif>Oregon</option>
                                    <option value="Pennsylvania" @if($user[0]->state == "Pennsylvania") selected @endif>Pennsylvania</option>
                                    <option value="Puerto Rico" @if($user[0]->state == "Puerto Rico") selected @endif>Puerto Rico</option>
                                    <option value="Rhode Island" @if($user[0]->state == "Rhode Island") selected @endif>Rhode Island</option>
                                    <option value="South Carolina" @if($user[0]->state == "South Carolina") selected @endif>South Carolina</option>
                                    <option value="South Dakota" @if($user[0]->state == "South Dakota") selected @endif>South Dakota</option>
                                    <option value="Tennessee" @if($user[0]->state == "Tennessee") selected @endif>Tennessee</option>
                                    <option value="Texas" @if($user[0]->state == "Texas") selected @endif>Texas</option>
                                    <option value="Utah" @if($user[0]->state == "Utah") selected @endif>Utah</option>
                                    <option value="Vermont" @if($user[0]->state == "Vermont") selected @endif>Vermont</option>
                                    <option value="Virginia" @if($user[0]->state == "Virginia") selected @endif>Virginia</option>
                                    <option value="Virgin Islands" @if($user[0]->state == "Virgin Islands") selected @endif>Virgin Islands</option>
                                    <option value="Washington" @if($user[0]->state == "Washington") selected @endif>Washington</option>
                                    <option value="West Virginia" @if($user[0]->state == "West Virginia") selected @endif>West Virginia</option>
                                    <option value="Wisconsin" @if($user[0]->state == "Wisconsin") selected @endif>Wisconsin</option>
                                    <option value="Wyoming" @if($user[0]->state == "Wyoming") selected @endif>Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 input-group">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-signpost-2"></i></span>
                                <input type="text" class="form-control" id="zip" name="zip"
                                    value="{{ $user[0]->zip }}" placeholder="Zip">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group has-validation">
                            <label class="input-group-text"><i class="bi bi-shield-shaded"></i></label>
                            <select name="level" class="form-select @error('level') is-invalid @enderror"
                                id="level">
                                <option value="">--Select a level--</option>
                                <option value="0" @if ($user[0]->level == '0') selected @endif>Administrator
                                </option>
                                <option value="1" @if ($user[0]->level == '1') selected @endif>Blog Manager
                                </option>
                                <option value="2" @if ($user[0]->level == '2') selected @endif>E-Commerce Manager
                                </option>
                                <option value="3" @if ($user[0]->level == '3') selected @endif>Customer/User
                                </option>
                            </select>
                            <span class="input-group-text">User Level</span>
                            @if ($errors->has('level'))
                                <div class="invalid-tooltip">{{ $errors->first('level') }}</div>
                            @endif
                        </div>
                    </div><input type="hidden" name="id" value="{{ $user[0]->user_id }}" />
                    <div class="form-field">
                        <button type="submit" class="btn btn-success btn-lg float-end" name="register"><i
                                class="bi bi-person-add"></i> Save User </button>

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
