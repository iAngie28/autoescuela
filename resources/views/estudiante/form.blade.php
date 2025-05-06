<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_reg" class="form-label">{{ __('Fecha Reg') }}</label>
            <input type="text" name="fecha_reg" class="form-control @error('fecha_reg') is-invalid @enderror" value="{{ old('fecha_reg', $estudiante?->fecha_reg) }}" id="fecha_reg" placeholder="Fecha Reg">
            {!! $errors->first('fecha_reg', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>