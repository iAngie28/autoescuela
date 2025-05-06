<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="categ_licencia" class="form-label">{{ __('Categ Licencia') }}</label>
            <input type="text" name="categ_licencia" class="form-control @error('categ_licencia') is-invalid @enderror" value="{{ old('categ_licencia', $instructor?->categ_licencia) }}" id="categ_licencia" placeholder="Categ Licencia">
            {!! $errors->first('categ_licencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>