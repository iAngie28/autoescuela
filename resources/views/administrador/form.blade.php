<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="turno" class="form-label">{{ __('Turno') }}</label>
            <input type="text" name="turno" class="form-control @error('turno') is-invalid @enderror" value="{{ old('turno', $administrador?->turno) }}" id="turno" placeholder="Turno">
            {!! $errors->first('turno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>