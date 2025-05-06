<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="monto" class="form-label">{{ __('Monto') }}</label>
            <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto', $pago?->monto) }}" id="monto" placeholder="Monto">
            {!! $errors->first('monto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="text" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $pago?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descuento" class="form-label">{{ __('Descuento') }}</label>
            <input type="text" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="{{ old('descuento', $pago?->descuento) }}" id="descuento" placeholder="Descuento">
            {!! $errors->first('descuento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_est" class="form-label">{{ __('Id Est') }}</label>
            <input type="text" name="id_est" class="form-control @error('id_est') is-invalid @enderror" value="{{ old('id_est', $pago?->id_est) }}" id="id_est" placeholder="Id Est">
            {!! $errors->first('id_est', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <select name="id_est" class="form-select @error('id_est') is-invalid @enderror">
            <option value="">Seleccione un estudiante</option>
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" {{ old('id_est') == $estudiante->id ? 'selected' : '' }}>
                    {{ $estudiante->NombreCompleto }}
                </option>
            @endforeach
        </select>
        <div class="form-group mb-2 mb20">
            <label for="id_adm" class="form-label">{{ __('Id Adm') }}</label>
            <input type="text" name="id_adm" class="form-control @error('id_adm') is-invalid @enderror" value="{{ old('id_adm', $pago?->id_adm) }}" id="id_adm" placeholder="Id Adm">
            {!! $errors->first('id_adm', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>