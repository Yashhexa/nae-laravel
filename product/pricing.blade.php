<div class="row">
    <div class="col-md-12"><label>Are we selling this "in house" or via our "distributors"?</label><br />
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" value="distributor" name="seller" id="btnradio1" autocomplete="off" @if($product->seller == "distributor") checked @endif>
            <label class="btn btn-outline-primary" for="btnradio1">Distributor</label>
          
            <input type="radio" class="btn-check" value="in-house" name="seller" id="btnradio2" autocomplete="off" @if($product->seller == "in-house") checked @endif>
            <label class="btn btn-outline-primary" for="btnradio2">In-House</label>

          </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('distributor_price') }}
            {{ Form::text('distributor_price', $product->distributor_price, ['class' => 'form-control' . ($errors->has('distributor_price') ? ' is-invalid' : ''), 'placeholder' => 'Distributor Price']) }}
            {!! $errors->first('distributor_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div id="hiddenDiv" style="display: none;">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 1') }}
            {{ Form::text('msrp1',64.45 , ['class' => 'form-control' . ($errors->has('msrp1') ? ' is-invalid' : ''), 'placeholder' => 'Msrp1', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 10') }}
            {{ Form::text('msrp10', round($product->msrp10, 2), ['class' => 'form-control' . ($errors->has('msrp10') ? ' is-invalid' : ''), 'placeholder' => 'Msrp10', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp10', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 25') }}
            {{ Form::text('msrp25', round($product->msrp25, 2), ['class' => 'form-control' . ($errors->has('msrp25') ? ' is-invalid' : ''), 'placeholder' => 'Msrp25', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp25', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 100') }}
            {{ Form::text('msrp100', round($product->msrp100, 2), ['class' => 'form-control' . ($errors->has('msrp100') ? ' is-invalid' : ''), 'placeholder' => 'Msrp100', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp100', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 250') }}
            {{ Form::text('msrp250',round($product->msrp250, 2) , ['class' => 'form-control' . ($errors->has('msrp250') ? ' is-invalid' : ''), 'placeholder' => 'Msrp250', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp250', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 500') }}
            {{ Form::text('msrp500', round($product->msrp500, 2), ['class' => 'form-control' . ($errors->has('msrp500') ? ' is-invalid' : ''), 'placeholder' => 'Msrp500', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp500', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 1000') }}
            {{ Form::text('msrp1000', round($product->msrp1000, 2), ['class' => 'form-control' . ($errors->has('msrp1000') ? ' is-invalid' : ''), 'placeholder' => 'Msrp1000', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp1000', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 2500') }}
            {{ Form::text('msrp2500', round($product->msrp2500, 2), ['class' => 'form-control' . ($errors->has('msrp2500') ? ' is-invalid' : ''), 'placeholder' => 'Msrp2500', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp2500', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 5000') }}
            {{ Form::text('msrp5000', round($product->msrp5000, 2), ['class' => 'form-control' . ($errors->has('msrp5000') ? ' is-invalid' : ''), 'placeholder' => 'Msrp5000', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp5000', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('MSRP 10000') }}
            {{ Form::text('msrp10000',round($product->msrp10000, 2), ['class' => 'form-control' . ($errors->has('msrp10000') ? ' is-invalid' : ''), 'placeholder' => 'Msrp10000', 'disabled' => 'disabled']) }}
            {!! $errors->first('msrp10000', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inHouseOption = document.getElementById('btnradio2');
        const distributorOption = document.getElementById('btnradio1');
        const hiddenDiv = document.getElementById('hiddenDiv');

        function toggleDivVisibility() {
            if (inHouseOption.checked) {
                hiddenDiv.style.display = 'block';
            } else {
                hiddenDiv.style.display = 'none';
            }
        }

        // Initial toggle when page loads
        toggleDivVisibility();

        // Add change event listener to toggle div visibility
        inHouseOption.addEventListener('change', toggleDivVisibility);
        distributorOption.addEventListener('change', toggleDivVisibility);
    });
</script>
