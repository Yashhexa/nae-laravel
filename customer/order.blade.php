@extends('layouts.receipt')
@section('content')

<section id="invoice">
    <div class="container-fluid">
        <div class="text-center">
            <img src="{{ asset('images/logo-transparent.png') }}" class="img-fluid mt-5" width="300">
        </div>
        <div class="text-center border-top border-bottom my-3 py-3">
            <h2 class="display-5 fw-bold">Invoice No. <span class="text-secondary"> NAE000{{$order->id}} </span></h2>
            <p class="m-0">Purchase Date: {{date("F j, Y",strtotime($order->created_at))}}</p>
        </div>

        <div class="d-md-flex justify-content-between">
            <div class="mt-5 mt-md-0">
                <p class="text-primary">Customer</p>
                <h4>{{$customer->name}}</h4>
                <ul class="list-unstyled">
                    <li>{{$customer['userInfo']->address}}</li>
                    <li>{{$customer['userInfo']->city}}, {{$customer['userInfo']->state}}, {{$customer['userInfo']->zip}} {{$customer['userInfo']->country}}</li>
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
                          <span class="text-danger fw-bold"> -({{number_format($order->discount, 2, '.', ',')}}) </span>
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
                @php
                if($order['invoice']->shipping_amount > 0){
                    $total = ($order->grand_total + $order['invoice']->shipping_amount);
                }else{
                    $total = $order->grand_total;
                }
            @endphp                                
                <tr>
                    <th></th>
                    <td></td>
                    <td class="text-primary fw-bold">Grand-Total</td>
                    <td class="text-primary fw-bold">${{number_format($total, 2, '.', ',')}}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-md-flex justify-content-between my-5">
                @if (isset($transaction->transaction_id))
                    <h1 class="fw-bold my-4 text-danger"><i class="bi bi-bank"></i> PAID</h1>
                @endif
                
                <ul class="list-unstyled">
                    <li><span class="fw-semibold">Authorization ID: </span> {{$transaction->auth_id}}</li>
                    <li><span class="fw-semibold">Transaction ID: </span>{{$transaction->transaction_id}} </li>
                    @if (isset($tracking_url))
                    <li><span class="fw-semibold">{{$order['invoice']->ship_via}} Tracking No.:</span> <a href="{{$tracking_url}}" target="_blank">{{$order->tracking_no}}</a></li>
                    @endif
                </ul>
  


        </div>



        <div id="footer-bottom">
            <div class=" border-top">
                <div class="row mt-3">
                    <div class="col-md-12 text-center copyright">
                        <p>© 2024 New Age Enclosures. <a href="/terms.html" target="_blank" class="text-decoration-none text-black-50">Terms & Conditions</a> </p>
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