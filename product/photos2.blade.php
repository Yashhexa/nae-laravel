<div class="row">
    <div class="alert displaynone" id="responseMsg"></div>
    <div class="col-md-6 col-12">
        <label>Select File</label>
        <div class="input-group">
            <input type='file' id="image_url" name='image_url' class="form-control @error('image_url') is-invalid @enderror" required>
            <span class="input-group-text"><i class="bi bi-image"></i></span>
            @if ($errors->has('image_url'))
            <div class="invalid-tooltip">{{ $errors->first('image_url') }}</div>
            @endif        
        </div>


    </div>
    <div class="col-md-6 col-6"><label>Alt Tag</label>
        <div class="input-group">
            <input type='text' id="alt_tag" name='alt_tag' class="form-control">
            <span class="input-group-text"><i class="bi bi-tag"></i></span>
        </div>
    </div>
 <input type='hidden' id="sort" name='sort' value="0">


</div>
