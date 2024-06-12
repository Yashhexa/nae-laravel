@extends('layouts.layouts')
@section('content')

<section id="invoice">
    <div class="container">
        <div class="text-center border-bottom my-3 py-3">
            <h2 class="display-5 fw-bold">Invoice No. <span class="text-secondary"> NAE000{{$order->id}} </span></h2>
            <p class="m-0">Date Created: {{date("F j, Y",strtotime($order->created_at))}}</p>
        </div>

        <div class="d-md-flex justify-content-between">
            <div>
                <p class="text-primary">Customer</p>
                <h4>{{$order['invoice']->bill_to_fname}} {{$order['invoice']->bill_to_lname}}</h4>
                <ul class="list-unstyled">
                    <li>{{$order['invoice']->bill_to_address}}</li>
                    <li>{{$order['invoice']->bill_to_city}}, {{$order['invoice']->bill_to_state}}, {{$order['invoice']->bill_to_zip}} {{$order['invoice']->bill_to_country}}</li>
                    <li>{{$customer['userInfo']->phone}}</li>
                    <li><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></li>
                </ul>
            </div>
            <div class="mt-5 mt-md-0">
                <p class="text-primary">From</p>
                <h4>New Age Enclosures</h4>
                <ul class="list-unstyled">
                    <li>2240 S. Thornburg Street</li>
                    <li>Santa Maria, California 93455</li>
                    <li>805-595-3500</li>
                    <li><a href="mailto:customerservice@newageenclosures.com">customerservice@newageenclosures.com</a></li>
                </ul>
            </div>
        </div>

        <table class="table border my-5">
            <thead>
                <tr class="bg-primary-subtle">
                    <th scope="col">SKU</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>

                </tr>
            </thead>
            <tbody>
@foreach ($items as $item)
<tr>
    <th scope="row"><a href="/enclosures/{{$item[4]}}.html" target="_blank">{{$item[4]}}</a></th>
    <td>{{$item['1']}}</td>
    <td>{{$item['3']}}</td>
    <td>${{number_format($item['2'], 2, '.', ',')}}</td>

</tr>   
@endforeach

                <tr>
                    <th></th>
                    <td></td>
                    <td class="fw-bold">Sub-Total</td>
                    <td class="fw-bold">${{number_format($sub_total, 2, '.', ',')}}</td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <td class="">
                        @if (isset($order->promo_code) && $order->promo_code != 0)
                          Discount Code: <span class="text-info fw-bold"> {{$order->promo_code}} </span>
                        @endif

                    </td>
                    <td>
                        @if (isset($order->discount) && $order->discount != 0)
                          <span class="text-danger fw-bold"> - ({{number_format($order->discount, 2, '.', ',')}}) </span>
                        @endif                        

                    </td>
                </tr>
                @if (isset($order['invoice']->shipping_amount))
                <tr>
                    <th></th>
                    <td></td>
                    <td class="text-success fw-bold">Shipping Cost ({{$order['invoice']->ship_via}})</td>
                    <td class="text-success fw-bold">+ ${{number_format($order['invoice']->shipping_amount, 2, '.', ',')}}</td>
                </tr>
                @endif                
                <tr>
                    <th></th>
                    <td></td>
                    @php
                        if($order['invoice']->shipping_amount > 0){
                            $total = ($order->grand_total + $order['invoice']->shipping_amount);
                        }else{
                            $total = $order->grand_total;
                        }
                    @endphp
                    <td class="text-primary fw-bold">Amount Due</td>
                    <td class="text-primary fw-bold">${{number_format($total, 2, '.', ',')}}</td>
                </tr>
            </tbody>
        </table>


        <div class="row mb-3 border-bottom pb-2"><h1 class="text-primary fw-light"><i class="bi bi-wallet2"></i> Select payment method</h1></div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="cc-tab" data-bs-toggle="tab" data-bs-target="#cc-tab-pane" type="button" role="tab" aria-controls="cc-tab-pane" aria-selected="true"><i class="bi bi-credit-card-2-back"></i> Credit Card</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pp-tab" data-bs-toggle="tab" data-bs-target="#pp-tab-pane" type="button" role="tab" aria-controls="pp-tab-pane" aria-selected="false"><i class="bi bi-paypal"></i> PayPal</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="ck-tab" data-bs-toggle="tab" data-bs-target="#ck-tab-pane" type="button" role="tab" aria-controls="ck-tab-pane" aria-selected="false"><i class="bi bi-bank2"></i> Electronic Check</button>
            </li>

          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cc-tab-pane" role="tabpanel" aria-labelledby="cc-tab" tabindex="0">@include('cart.cc')</div>
            <div class="tab-pane fade" id="pp-tab-pane" role="tabpanel" aria-labelledby="pp-tab" tabindex="0">@include('cart.pp')</div>
            <div class="tab-pane fade" id="ck-tab-pane" role="tabpanel" aria-labelledby="ck-tab" tabindex="0">@include('cart.ec')</div>
          </div>










        <div id="footer-bottom">
            <div class="container border-top">
                <div class="row mt-3">
                    <div class="col-md-12 text-center copyright">
                        <p>© @php
                            echo date('Y');
                        @endphp New Age Enclosures - <a href="/terms.html" target="_blank" class="text-decoration-none text-black-50">Terms & Conditions</a> </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    @endsection                