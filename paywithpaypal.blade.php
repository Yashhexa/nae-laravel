@extends('layouts.layouts')
@section('content')
	<div class="container">
    <div class="row">    	
        <div class="col-md-8 col-md-offset-2">        	
        	<h3 class="text-center" style="margin-top: 90px;"> How To Integrate Paypal Payment Gateway In Laravel 10 - Vidvatek</h3>
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
                <div class="panel-heading"><b>Paywith Paypal</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Enter Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
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