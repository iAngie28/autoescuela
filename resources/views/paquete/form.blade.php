<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cant_class" class="form-label">{{ __('Cant Class') }}</label>
            <input type="text" name="cant_class" class="form-control @error('cant_class') is-invalid @enderror" value="{{ old('cant_class', $paquete?->cant_class) }}" id="cant_class" placeholder="Cant Class">
            {!! $errors->first('cant_class', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="capacidad_est" class="form-label">{{ __('Capacidad Est') }}</label>
            <input type="text" name="capacidad_est" class="form-control @error('capacidad_est') is-invalid @enderror" value="{{ old('capacidad_est', $paquete?->capacidad_est) }}" id="capacidad_est" placeholder="Capacidad Est">
            {!! $errors->first('capacidad_est', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="costo" class="form-label">{{ __('Costo') }}</label>
            <input type="text" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $paquete?->costo) }}" id="costo" placeholder="Costo">
            {!! $errors->first('costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>