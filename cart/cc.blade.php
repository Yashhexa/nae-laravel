<form method="post" action="{{ route('dopay.online') }}" class="needs-validation" novalidate="">@csrf
    <h1 class="mb-3 mt-3 text-success fw-light"><i class="bi bi-credit-card"></i> Billing information</h1>

               <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    @php
                        $months = ['1' => 'Jan', '2' => 'Feb', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'Jun', '7' => 'July', '8' => 'Aug', '9' => 'Sep', '10' => 'OCT', '11' => 'Nov', '12' => 'Dec'];
                    @endphp
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" name="owner" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback"> Name on card is required </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Card number</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="bi bi-credit-card-2-back"></i></span>
                        <input type="number" name="cardNumber" class="form-control"
                            placeholder="Card number..." required>
                    </div>
                    <div class="invalid-feedback"> Credit card number is required </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="cc-expiration">Exp Month</label>
                    <select class="form-control" name="expiration-month">
                        @foreach ($months as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback"> Expiration month required </div>
                </div>
                <div class="col-md-4 mb-3">

                    <label>Exp Year</label>
                    <select class="form-control" name="expiration-year">
                        @for ($i = date('Y'); $i <= date('Y') + 15; $i++)
                            <option value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                    </select>
                    <div class="invalid-feedback"> Expiration year required </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="number" name="cvv" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8  mb-5 fs-2 fw-light"><span
                        class="text-secondary">Total:</span>
                    @php
                        if($order['invoice']->shipping_amount > 0){
                            $total = ($order->grand_total + $order['invoice']->shipping_amount);
                        }else{
                            $total = $order->grand_total;
                        }

                    @endphp
                <span class="text-primary fw-bold">${{number_format($total, 2, '.', ',') }}</span>
                <input type="hidden" name="amount" value="{{$total}}" />
                  <input type="hidden" name="firstName" value="{{$customer->name}}" />
                  <input type="hidden" name="lastName" value="{{$customer->lname}}" />
                  <input type="hidden" name="address" value="{{$customer['userInfo']->address}}" />
                  <input type="hidden" name="city" value="{{$customer['userInfo']->city}}" />
                  <input type="hidden" name="state" value="{{$customer['userInfo']->state}}" />
                  <input type="hidden" name="zip" value="{{$customer['userInfo']->zip}}" />
                  <input type="hidden" name="country" value="{{$customer['userInfo']->country}}" />
                  <input type="hidden" name="order_id" value="{{$order->id}}" />
                </div>
                <div class="col-md-4 mb-3 d-grid gap-2"><button type="submit" onclick="loadr()" class="btn btn-primary btn-lg"><i
                    class="spinner-border spinner-border-sm" id="sub" style="display:none;"></i>  Make Payment <i class="bi bi-wallet"></i></button></div>
            </div>

</form>

<script>
    
    function loadr() {
      document.getElementById("sub").style.display = "inline-flex";
    }

(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()   
      </script>