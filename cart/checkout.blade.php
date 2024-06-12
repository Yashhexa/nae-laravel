@extends('layouts.layouts')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-9 order-1"> 
                @include('cart.placeorder')
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4> <i class="bi bi-info-circle-fill"></i> Order Summary</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($cart as $item)
                            <li class="list-group-item">
                                <strong>{{ $item[1]->name }}</strong> <br /><small class="text-secondary">{{number_format($item[0])}}pc - ${{ number_format(($item[0] * $item[2]), 2, '.', ',') }}</small>
                            </li>
                        @endforeach

                        @php
                            if (isset($discount)) {
                                if ($discount[1] > 0) {
                                    $new_total = $total - $discount[1];
                                    echo "<li class=\"list-group-item text-end\"><small class='text-primary'>Discount code: <strong>" .
                                        $discount[0] .
                                        "</strong></small>
                    <p> $" .
                                        number_format($total, 2, '.', ',') .
                                        "<br /> <span class=\"text-danger\">- $" .
                                        number_format($discount[1], 2, '.', ',') .
                                        "</span></p></li>
                    <li class=\"card-footer text-end\"> <h4>Total: <span class=\"text-success\">$" .
                                        number_format($new_total, 2, '.', ',') .
                                        '</span></h4></li>';
                                } else {
                                    echo "<li class=\"card-footer text-end\"><h4>Total: <span class=\"text-success\">$" . number_format($total, 2, '.', ',') . '</span></h4></li>';
                                }
                            } else {
                                echo "<li class=\"card-footer text-end\"><h4>Total: <span class=\"text-success\">$" . number_format($total, 2, '.', ',') . '</span></h4></li>';
                            }
                        @endphp


                    </ul>
                </div>
                <div class="card mt-3">
                    <div class="card-body  d-grid gap-2">
                        <form method="post" action="{{ route('apply') }}">@csrf
                            <h5 class="card-title text-success"><i class="bi bi-tags"></i> Discount Code</h5>
                            <p class="card-text">If you have a discount code please enter it below:</p>

                            <input type="text" name="code" class="form-control" />
                            <input type="hidden" name="cart_id" value="{{ $id }}" />
                            <input type="hidden" name="amount" value="{{ $total }}" />
                            <button class="btn btn-outline-secondary mt-3"><i class="bi bi-tags-fill"></i> Apply
                                Discount</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body  d-grid gap-2">
                        <h5 class="card-title text-success"><i class="bi bi-life-preserver"></i> Need help?</h5>
                        <p class="card-text">If you need help with your order or would simply like to place your order by
                            phone, please call us at <strong>855-426-3625</strong> or click below to contact us via the web
                            site.</p>
                        <a href="/contact" class="btn btn-success"><i class="bi bi-person-lines-fill"></i> Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>    
    <script>
        (function() {
            'use strict'

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }());

        function handleCheckboxChange() {
            var checkbox = document.getElementById('toggleCheckbox');
            var divToToggle = document.getElementById('shipping');

            // Toggle the visibility of the div
            divToToggle.style.display = checkbox.checked ? 'none' : 'block';
        }

        // Attach the function to the checkbox change event
        document.getElementById('toggleCheckbox').addEventListener('change', handleCheckboxChange);
    </script>
@endsection
