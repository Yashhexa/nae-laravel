@extends('layouts.admin')
@section('content')

<section id="invoice">
    <div class="container p-5">
        <div class="text-center">
            <img src="{{ asset('images/logo-transparent.png') }}" class="img-fluid mt-5" width="300">
        </div>
        <div class="text-center border-top border-bottom my-3 py-3">
            <h2 class="display-5 fw-bold">Invoice No. <span class="text-secondary"> NAE000{{$order->id}} </span></h2>
            <p class="m-0">Purchase Date: {{date("F j, Y",strtotime($order->created_at))}}</p>
        </div>

        <div class="d-md-flex justify-content-between">
            <div>
                <p class="text-primary">Customer</p>
                <h4>{{$customer->name}} {{$customer->lname}}</h4>
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
        @if ($order->notes != "")
        <div class="row p-3 text-danger rounded mb-5 mt-2" style="border: 2px dotted red"><b>Comments:</b><hr /> {{$order->notes}}</div>
        @endif
@if (isset($order['invoice']->ship_number) || isset($order['invoice']->shipping_amount))
<form method="post" action="{{ route('update_status') }}" >@csrf
    <div class="row border-bottom pb-5">
        
        <div class="col-md-4">
        @if (($order['invoice']->status == "shipped" || $order['invoice']->status == "delivered") && !isset($tracking_url)) 
        <div class="input-group">
        <span class="input-group-text">{{$order['invoice']->ship_via}}</span>
        <input type="text" name="tracking_no" class="form-control" placeholder="Enter tracking No." value="{{$order->tracking_no}}" />  
        </div>
        @elseif (isset($tracking_url))
        {{$order['invoice']->ship_via}} Tracking No. <a href="{{$tracking_url}}" target="_blank">{{$order->tracking_no}}</a>
        @endif

    </div>
    <div class="col-md-2 text-end p-2"><h4 class="fw-light">Update Status:</h4></div>
    <div class="col-md-3 p-2"><input type="hidden" name="order_id" value="{{$order->id}}" />
        <select name="status" class="form-select">
            <option value="">Select Status</option>
            <option value="pending" @if ($order['invoice']->status == "pending") selected @endif>Pending</option> 
            <option value="processing" @if ($order['invoice']->status == "processing") selected @endif>Processing</option>
            <option value="shipped" @if ($order['invoice']->status == "shipped") selected @endif>Shipped</option>
            <option value="delivered" @if ($order['invoice']->status == "delivered") selected @endif>Delivered</option>
            <option value="canceled" @if ($order['invoice']->status == "canceled") selected @endif>Canceled</option>
         </select>
    </div>
    <div class="col-md-2 p-2"><button class="btn btn-primary">Update</button></div>
    </div>

</form>

        <div class="d-md-flex justify-content-between my-5">

                <h1 class="text-danger"><i class="bi bi-bank"></i> PAID</h1>
                <ul class="list-unstyled">
                    <li><span class="fw-semibold">Authorization ID: </span> {{$order['transaction']->auth_id}}</li>
                    <li><span class="fw-semibold">Transaction ID: </span>{{$order['transaction']->transaction_id}} </li>
                    <li><span class="fw-semibold">Amount: </span>${{number_format($total, 2, '.', ',')}} </li>
                </ul>
        </div>
@else
<form method="post" action="{{ route('updateshipping') }}" class="needs-validation" novalidate="">@csrf
    <input type="hidden" name="invoice_id" value="{{$order['invoice']->id}}" />
<div class="row text-end">
<div class="col-md-4">
Shipping Carrier
</div>
<div class="col-md-8">
    <select name="ship_via" class="form-select">
        <option value="">Select One</option>
        <option value="Fedex">Fedex</option>
        <option value="Fedex">UPS</option>
        <option value="Fedex">DHL</option>
    </select>
</div>
</div>
<div class="row mt-3 mb-3 text-end">
<div class="col-md-4">
    Shipping Cost
    </div>
    <div class="col-md-8">
<input type="text" name="shipping_amount" class="form-control" />
    </div>

</div>
<div class="row mb-3">
<div class="col-md-4"></div>
<div class="col-md-6"><button type="submit" class="btn btn-outline-primary btn-lg">Add shipping cost</button></div>
</div>
</form>
@endif

        <div id="footer-bottom">
            <div class="border-top">
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