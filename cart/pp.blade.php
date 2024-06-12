
<div class="container">
    <div class="row">    	
        <div class="col-md-8 col-md-offset-2">        	
            <div class="panel panel-default" style="margin-top: 60px;">

                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif

                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{ route('paypal.payment') }}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                 @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
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
                            @foreach ($items as $item)
                            <input id="amount" type="hidden" name="amount[{{$item[4]}}]" value="{{$item['2']}}">
                            @endforeach
                            <input type="hidden" name="address_line_1" value="{{$order->ship_address}}" />
                            <input type="hidden" name="city" value="{{$order->ship_city}}" />
                            <input type="hidden" name="state" value="{{$order->ship_state}}" />
                            <input type="hidden" name="zip" value="{{$order->ship_zip}}" />
                            <input type="hidden" name="country" value="{{$order['invoice']->ship_to_country}}" />
                            <input type="hidden" name="total" value="{{$total}}" />    
                            <input type="hidden" name="firstName" value="{{$customer->name}}" />
                              <input type="hidden" name="lastName" value="{{$customer->lname}}" />
                              <input type="hidden" name="order_id" value="{{$order->id}}" />
                            </div>
                            <div class="col-md-4 mb-3 d-grid gap-2"><button type="submit" onclick="loadr3()" class="btn btn-primary btn-lg"><i
                                class="spinner-border spinner-border-sm" id="sub3" style="display:none;"></i>  Pay with PayPal <i class="bi bi-paypal"></i></button></div>
                        </div>
                    </form>
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
        function loadr3() {
      document.getElementById("sub3").style.display = "inline-flex";
    }
  </script>