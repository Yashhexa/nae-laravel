@extends('layouts.admin')
@section('content')

    <div class="container">
        <form method="post" action="{{ route('promo.save') }}" class="needs-validation" novalidate="">@csrf
        <div class="row">
            <div class="col-md-12"><h1 class="text-success mt-5"><i class="bi bi-receipt"></i> Add a new promo code</h1></div>
            <div class="col-md-6">
                <label id="code">Enter Code</label>
                <input type="text" name="code" class="form-control" />
            </div>
            <div class="col-md-6"> 
                <div class="form-floating">
                <select class="form-select" name="type">
                    <option value="percent">Percent of Total</option>
                    <option value="flat">Flat Rate Discount</option>
                </select>
                <label for="code">Select the type of discount</label>
                </div>
            </div>
            <div class="col-md-6">
<label id="amount" class="mt-3">Amount of Discount <a href="#" data-bs-toggle="tooltip" data-bs-title="If you are offering a percentage off the total price put in the percent & amount other wise enter in the flat discount amount."><i class="bi bi-question-circle-fill"></i></a></label>
<div class="input-group">
    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calculator"></i></span>
    <input type="text" name="amount" class="form-control" placeholder="Discount amount" aria-label="amount" aria-describedby="basic-addon1">
  </div>
    
          
            </div>
            <div class="col-md-6">
                <label for="date" class="mt-3">Expiration Date</label>                
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" name="expires" id="expires"/>
                    <span class="input-group-append">
                      <span class="input-group-text d-block">
                        <i class="bi bi-calendar3-week-fill"></i>
                      </span>
                    </span>
                  </div>

            </div>
            <div class="col-md-12 mt-3 text-end"><button type="submit" class="btn btn-primary"><i class="bi bi-plus-square"></i> Add discount code</button>
        </div>
    </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
    <script id="rendered-js">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>    
<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>    
@endsection
