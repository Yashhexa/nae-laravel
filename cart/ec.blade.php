<form method="post" action="{{ route('bank') }}" class="needs-validation" novalidate="">@csrf
    <div class="row">
    <div class="col-md-6 p-3">
        <label class="form-label">Account Holder Name</label> <input type="text" name="account_holder_name" class="form-control"
            placeholder="Enter name..." required/><div class="invalid-feedback"> Account holder required </div>
    </div>
    <div class="col-md-6 p-3">
        <label class="form-label">Financial Institution</label> <input type="text" class="form-control"
            placeholder="Enter name..." name="financial_intitution" required/><div class="invalid-feedback"> Financial institution required </div>
    </div>
    <div class="col-md-6 p-3">
        <label class="form-label">Routing Number</label><input type="text" class="form-control"
            placeholder="Enter number..." name="routing_no" required /><div class="invalid-feedback"> Routing number required </div>
    </div>
    <div class="col-md-6 p-3">
        <label class="form-label">Account Number</label> <input type="text" class="form-control"
            placeholder="Enter number..." name="account_no" required/><div class="invalid-feedback"> Account number required </div>
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
      <input type="hidden" name="address" value="{{$customer['userInfo']->address}}" />
      <input type="hidden" name="city" value="{{$customer['userInfo']->city}}" />
      <input type="hidden" name="state" value="{{$customer['userInfo']->state}}" />
      <input type="hidden" name="zip" value="{{$customer['userInfo']->zip}}" />
      <input type="hidden" name="country" value="{{$customer['userInfo']->country}}" />
      <input type="hidden" name="order_id" value="{{$order->id}}" />
    </div>
    <div class="col-md-4 mb-3 d-grid gap-2"><button type="submit" onclick="loadr2()" class="btn btn-primary btn-lg"><i
        class="spinner-border spinner-border-sm" id="sub2" style="display:none;"></i> Make Payment <i class="bi bi-bank2"></i></button></div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script>
    function loadr2() {
        document.getElementById("sub2").style.display = "inline-flex";
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
