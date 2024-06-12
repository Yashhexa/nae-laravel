<div class="row">
    <div class="alert displaynone" id="responseMsg"></div>
    <div class="col-md-5 col-12">
<input type="hidden" name="p_id" value="{{$product->id}}" />
          <label>Select File</label>
                <div class="input-group">
                    <input type='file' id="file" name='file' class="form-control">
                    <span class="input-group-text"><i class="bi bi-image"></i></span>
                </div>
                     <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

    </div>
<div class="col-md-4 col-6"><label>Alt Tag</label>
    <div class="input-group">
        <input type='text' id="alt_tag" name='alt_tag' class="form-control">
        <span class="input-group-text"><i class="bi bi-tag"></i></span>
    </div>    
</div>
<div class="col-md-1 col-6"><label>Order</label>
    <div class="input-group">
        <input type='text' id="sort" name='sort' class="form-control">

    </div>    
</div>
<div class="col-md-2 col-12">
    <div class="d-grid gap-2 mt-4">

              <input type="button" id="submit" value='Upload' class='btn btn-success btn-lg'>

   </div>    
</div>
</div>

<div class="row mt-3"><div class="col-12">Current product photos:</div>
<div class="col-md-3 col-6 displaynone" id="filepreview"> <img src="" class="displaynone img-fluid img-thumbnail" ></div>
@if(!empty($product->image_url))
<div class="col-md-3 col-6"><img src="{{ $product->image_url }}" class="img-fluid img-thumbnail" /><a href="/del_photo/{{ $product->id }}/@if (str_contains($product->image_url, 'products'))
{{ str_replace('/products/','',$product->image_url) }}@else{{ str_replace('/media/','',$product->image_url) }}
    @endif
   " class="text-danger"><i class="bi bi-trash3-fill"></i>Delete Image</a></div>
@endif
@if($photos)   
@foreach ($photos as $photo)
@if ($photo->photo_url != $product->image_url)
     <div class="col-md-3 col-6"><img src="{{ $photo->photo_url }}" class="img-fluid img-thumbnail" /><a href="/destroy/{{ $photo->id }}" class="text-danger"><i class="bi bi-trash3-fill"></i>Delete Image</a></div>
     @endif
     @endforeach
@endif
        

</div>
