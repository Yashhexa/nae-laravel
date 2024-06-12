<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('photo_url') }}
            {{ Form::text('photo_url', $photo->photo_url, ['class' => 'form-control' . ($errors->has('photo_url') ? ' is-invalid' : ''), 'placeholder' => 'Photo Url']) }}
            {!! $errors->first('photo_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alt_tag') }}
            {{ Form::text('alt_tag', $photo->alt_tag, ['class' => 'form-control' . ($errors->has('alt_tag') ? ' is-invalid' : ''), 'placeholder' => 'Alt Tag']) }}
            {!! $errors->first('alt_tag', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('product_id') }}
            {{ Form::text('product_id', $photo->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sort') }}
            {{ Form::text('sort', $photo->sort, ['class' => 'form-control' . ($errors->has('sort') ? ' is-invalid' : ''), 'placeholder' => 'Sort']) }}
            {!! $errors->first('sort', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>