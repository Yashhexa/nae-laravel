<div class="row">
    <div class="col-md-6">
        {{ Form::label('stock') }}
        {{ Form::text('stock', $product->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
        {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('type') }}
        {{ Form::text('type', $product->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('pcb_size') }}
        {{ Form::text('pcb_size', $product->pcb_size, ['class' => 'form-control' . ($errors->has('pcb_size') ? ' is-invalid' : ''), 'placeholder' => 'Pcb Size']) }}
        {!! $errors->first('pcb_size', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('pcb_thickness') }}
        {{ Form::text('pcb_thickness', $product->pcb_thickness, ['class' => 'form-control' . ($errors->has('pcb_thickness') ? ' is-invalid' : ''), 'placeholder' => 'Pcb Thickness']) }}
        {!! $errors->first('pcb_thickness', '<div class="invalid-feedback">:message</div>') !!}
    </div>    
    <div class="col-md-6">
        {{ Form::label('GTIN') }}
        {{ Form::text('gtin', $product->gtin, ['class' => 'form-control' . ($errors->has('gtin') ? ' is-invalid' : '')]) }}
        {!! $errors->first('gtin', '<div class="invalid-feedback">:message</div>') !!}
    </div> 
    <div class="col-md-6">
        {{ Form::label('release_year') }}
        {{ Form::text('release_year', $product->release_year, ['class' => 'form-control' . ($errors->has('release_year') ? ' is-invalid' : ''), 'placeholder' => 'Release Year']) }}
        {!! $errors->first('release_year', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('discontinued') }}
        {{ Form::text('discontinued', $product->discontinued, ['class' => 'form-control' . ($errors->has('discontinued') ? ' is-invalid' : ''), 'placeholder' => 'Discontinued']) }}
        {!! $errors->first('discontinued', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('assembly') }}
        {{ Form::text('assembly', $product->assembly, ['class' => 'form-control' . ($errors->has('assembly') ? ' is-invalid' : ''), 'placeholder' => 'Assembly']) }}
        {!! $errors->first('assembly', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="col-md-6">
        {{ Form::label('eccn') }}
        {{ Form::text('eccn', $product->eccn, ['class' => 'form-control' . ($errors->has('eccn') ? ' is-invalid' : ''), 'placeholder' => 'Eccn']) }}
        {!! $errors->first('eccn', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('hts_code') }}
        {{ Form::text('hts_code', $product->hts_code, ['class' => 'form-control' . ($errors->has('hts_code') ? ' is-invalid' : ''), 'placeholder' => 'Hts Code']) }}
        {!! $errors->first('hts_code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('coo') }}
        {{ Form::text('coo', $product->coo, ['class' => 'form-control' . ($errors->has('coo') ? ' is-invalid' : ''), 'placeholder' => 'Coo']) }}
        {!! $errors->first('coo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('moq') }}
        {{ Form::text('moq', $product->moq, ['class' => 'form-control' . ($errors->has('moq') ? ' is-invalid' : ''), 'placeholder' => 'Moq']) }}
        {!! $errors->first('moq', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('rec_stock') }}
        {{ Form::text('rec_stock', $product->rec_stock, ['class' => 'form-control' . ($errors->has('rec_stock') ? ' is-invalid' : ''), 'placeholder' => 'Rec Stock']) }}
        {!! $errors->first('rec_stock', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('related') }}
        {{ Form::text('related', $product->related, ['class' => 'form-control' . ($errors->has('related') ? ' is-invalid' : ''), 'placeholder' => 'Related']) }}
        {!! $errors->first('related', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('attributes') }}
        {{ Form::text('attributes', $product->attributes, ['class' => 'form-control' . ($errors->has('attributes') ? ' is-invalid' : ''), 'placeholder' => 'Attributes']) }}
        {!! $errors->first('attributes', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6">
        {{ Form::label('documents') }}
        {{ Form::text('documents', $product->documents, ['class' => 'form-control' . ($errors->has('documents') ? ' is-invalid' : ''), 'placeholder' => 'Documents']) }}
        {!! $errors->first('documents', '<div class="invalid-feedback">:message</div>') !!}
    </div>        
</div>
