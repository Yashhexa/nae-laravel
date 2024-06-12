<style>
label {
    margin-top: 10px;
    color: #807f7f;
}
</style> 
<div class="row"><input type="hidden" name="id" value="{{$product->id}}" />
<div class="col-md-12">
    <div class="form-group">
        {{ Form::label('name') }}
        {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'name']) }}
        @if ($errors->has('name'))
        <div class="invalid-tooltip">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        {{ Form::label('description') }}
        <textarea id="description" name='description' rows="4" class="form-control @error('description') is-invalid @enderror" required>{{$product->description}}</textarea>
        @if ($errors->has('description'))
        <div class="invalid-tooltip">{{ $errors->first('description') }}</div>
        @endif
    </div>
</div>
<div class="col-md-6">
    {{ Form::label('SKU/Part No.') }}
    <input type='text' value="{{$product->sku}}" id="sku" name='sku' class="form-control @error('sku') is-invalid @enderror" required>
    @if ($errors->has('sku'))
    <div class="invalid-tooltip">{{ $errors->first('sku') }}</div>
    @endif
</div>
<div class="col-md-6">
    {{ Form::label('Category') }}
    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
        @foreach ($categories as $category)
        <option value="{{$category->name}}" @if($product->category_id == $category->name) selected @endif>{{$category->name}}</option>  
        @endforeach
    </select>
    @if ($errors->has('category_id'))
    <div class="invalid-tooltip">{{ $errors->first('category_id') }}</div>
    @endif
</div>
<div class="col-md-6">
    {{ Form::label('status') }}
    <select name="status" class="form-control">
        <option value="Pre-Release" @if ($product->status == "Pre-Release") selected @endif>Pre-Release</option>
        <option value="New-Release" @if ($product->status == "New-Release") selected @endif>New-Release</option>
        <option value="Active" @if ($product->status == "Active") selected @endif>Active</option>
        <option value="EOL-MTO" @if ($product->status == "EOL-MTO") selected @endif>EOL-MTO</option>
        <option value="Discontinued" @if ($product->status == "Discontinued") selected @endif>Discontinued</option>
    </select>
    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="col-md-6">
    {{ Form::label('color') }}
    <select name="color" class="form-control">
        @foreach ($colors as $color)
            <option value="{{$color->name}}" @if ($color->name == $product->color) selected @endif >{{$color->name}}</option>
        @endforeach
    </select>
    {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}    
    </div>
    <div class="col-md-6">
    {{ Form::label('material') }}
    <select name="material" class="form-control">
        @foreach ($materials as $material)
            <option value="{{$material->name}}" @if ($material->name == $product->material) selected @endif>{{$material->name}}</option>
        @endforeach
    </select>
    {!! $errors->first('material', '<div class="invalid-feedback">:message</div>') !!}    
    </div>        

<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('url_key') }}
        {{ Form::text('url_key', $product->url_key, ['class' => 'form-control' . ($errors->has('url_key') ? ' is-invalid' : ''), 'placeholder' => 'Url Key']) }}
        {!! $errors->first('url_key', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="col-md-12"> {{ Form::label('3D Model URL') }}
    @if($product->model_url)
    - <small>Currently: ( <a href="/models/{{$product->model_url}}" target="_blank">/models/{{$product->model_url}}</a> | <a href="/delete_model/{{$product->id}}" class="text-danger">Delete Model</a> ) </small>
@endif

    <div class="input-group">
        <input type="hidden" value="{{$product->model_url}}" name="model_url" />
        <input class="form-control" id="model_url" name="model_url" type="file">
        <span class="input-group-text"><a href="{{$product->model_url}}" target="_blank"><i class="bi bi-box"></i></a></span>
        {!! $errors->first('model_url', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>


    
<div class="col-md-12">{{ Form::label('Data Sheet') }} 
    @if($product->datasheet_url)
     - <small>Currently: ( <a href="{{$product->datasheet_url}}" target="_blank">{{$product->datasheet_url}}</a> | <a href="/delete_data_sheet/{{$product->id}}" class="text-danger">Delete Data Sheet</a>) </small>
    @endif
    
    <div class="input-group">
        <input type="hidden" value="{{$product->datasheet_url}}" name="datasheet_url" />
        <input class="form-control" id="datasheet_url" name="datasheet_url" type="file">
        <span class="input-group-text"><a href="{{$product->datasheet_url}}" target="_blank"><i class="bi bi-file-earmark-pdf"></i></a></span>
        {!! $errors->first('datasheet_url', '<div class="invalid-feedback">:message</div>') !!}

    </div>
</div>


<div class="col-md-6">
    {{ Form::label('weight') }}
    {{ Form::text('weight', $product->weight, ['class' => 'form-control' . ($errors->has('weight') ? ' is-invalid' : ''), 'placeholder' => 'Weight']) }}
    {!! $errors->first('weight', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="col-md-6">
    {{ Form::label('length') }}
    {{ Form::text('length', $product->length, ['class' => 'form-control' . ($errors->has('length') ? ' is-invalid' : ''), 'placeholder' => 'Length']) }}
    {!! $errors->first('length', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="col-md-6">
    {{ Form::label('width') }}
    {{ Form::text('width', $product->width, ['class' => 'form-control' . ($errors->has('width') ? ' is-invalid' : ''), 'placeholder' => 'Width']) }}
    {!! $errors->first('width', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="col-md-6">
    {{ Form::label('height') }}
    {{ Form::text('height', $product->height, ['class' => 'form-control' . ($errors->has('height') ? ' is-invalid' : ''), 'placeholder' => 'Height']) }}
    {!! $errors->first('height', '<div class="invalid-feedback">:message</div>') !!}
</div>





</div>