@extends('layouts.layouts')
@section('content')
@php
  //echo "<pre>"; print_r($orders[0]['transaction']->transaction_id); exit;
@endphp
    <div class="container">
<div class="row mt-3">
  <ul class="nav nav-underline justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" aria-current="dashboard" href="/dashboard">Orders</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/account">My Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/all">Shop</a>
    </li>     
    <li class="nav-item">
      <a class="nav-link" href="/contact">Get Help</a>
    </li>
  </ul>
</div>      
        <div class="row">
            <h1 class="text-success fw-light mt-3">Welcome <strong>{{ Auth::user()->name }}</strong>!</h1>
            @if ($item_count > 0)
                <p class="badge text-bg-success fs-4 fw-light">You have {{ $item_count }} item(s) in your cart. <a
                        href="/checkout/{{ $cart_id }}" class="btn btn-secondary"><i class="bi bi-cart-check-fill"></i>
                        Click here to proceed to checkout</a></p>
            @endif
            <hr />
        </div>
        @if (count($orders) < 1)
        <div class="row border-bottom mb-3 pb-3">
          <div class="col-md-12">
          You have not made any purchases. <a href="/all">Click here</a> to browse our inventory.
          </div>
        </div>
          
        @endif
        @foreach ($orders as $k=>$order)
            <div class="row border-bottom mb-3 pb-3">
                <div class="col-md-2">{{ date("F j, Y",strtotime($order->created_at)) }}</div>
                <div class="col-md-3">Invoice No.: <strong class="text-success">NAE000{{ $order->id }}</strong></div>
                <div class="col-md-2">Status: <strong class="text-primary">{{ $order->status }}</strong></div>
                
                  @if (isset($order['transaction']->transaction_id))
                   <div class="col-md-3">Transaction ID: <strong class="text-info"> {{ $order['transaction']->transaction_id }}</strong></div>
                   <div class="col-md-2"><a href="#" class="btn btn-success btn-sm open-invoice" data-invoice-id="{{ $order->id }}"><i class="bi bi-eye"></i> View Invoice</a></div>
                   @elseif (isset($order['invoice']->ship_number) || isset($order['invoice']->shipping_amount))
                   <div class="col-md-3"></div>
                   <div class="col-md-2"><a href="/paynow/{{ $order->id }}" class="btn btn-primary btn-sm"><i class="bi bi-wallet2"></i> Pay Invoice</a> </div>
                   @else
                   <div class="col-md-3"></div>
                   <div class="col-md-2"><span class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" data-bs-title="Our customer service dept. is verifying the order and calculating shipping costs. You will receive an email when your invoice has been updated."><i class="bi bi-stopwatch"></i> Updating...</span></div>
                   @endif
            </div>
        @endforeach
   
        <div class="row p-5"> {{ $orders->links('vendor.pagination.orders') }} </div>   
    </div>
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body" id="invoiceModalContent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printInvoiceButton">Print Invoice</button>
              </div>            
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script>
      $(document).ready(function() {
        // Event listener for all buttons with the class "open-invoice"
        $('.open-invoice').click(function() {
          // Get the data-invoice-id attribute value
          const invoiceId = $(this).data('invoice-id');
    
          // Load content from the corresponding invoice.html into the modal
          $('#invoiceModalContent').load(`/order/${invoiceId}`, function() {
            // Show the modal when content is loaded
            $('#invoiceModal').modal('show');
          });
        });
    
        // Event listener for the "Print Invoice" button
        $('#printInvoiceButton').click(function() {
          // You can customize this function to include the specific content you want to print
          var contentToPrint = document.getElementById("invoiceModalContent").innerHTML;
          var printWindow = window.open('', '_blank');
          printWindow.document.open();
          printWindow.document.write('<html><head><title>Print</title></head><body>' + contentToPrint + '</body></html>');
          printWindow.document.close();
          printWindow.print();
        });
      });
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))      
    </script>
@endsection
