@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="col-md-12 mt-3"><h1 class="text-success"><i class="bi bi-receipt"></i> Manage Discount Codes</h1></div>
        <div class="row mb-2 text-info">
            <div class="col-md-2">Code</div>
            <div class="col-md-2">Expiration</div>
            <div class="col-md-2">Type</div>
            <div class="col-md-2">Amount</div>
            <div class="col-md-2"></div>
        </div>        
@foreach ($promos as $promo)
        <div class="row mb-2">
            <div class="col-md-2"><span class="badge bg-primary"> {{$promo->code}} </span></div>
            <div class="col-md-2">{{date('F j, Y' ,strtotime($promo->expires))}}</div>
            <div class="col-md-2">{{$promo->type}}</div>
            <div class="col-md-2">{{$promo->amount}}</div>
            <div class="col-md-2"><a href="/promo/delete/{{$promo->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Delete</a></div>
        </div>
 @endforeach   

 <div class="row p-5"> {{ $promos->links('vendor.pagination.orders') }} </div>   
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection