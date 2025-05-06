<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="monto" class="form-label">{{ __('Monto') }}</label>
            <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto', $pago?->monto) }}" id="monto" placeholder="Monto">
            {!! $errors->first('monto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descuento" class="form-label">{{ __('Descuento') }}</label>
            <input type="text" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="{{ old('descuento', $pago?->descuento) }}" id="descuento" placeholder="Descuento">
            {!! $errors->first('descuento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <select name="id_est" id="id_est" class="form-select @error('id_est') is-invalid @enderror">
            <option value="">Seleccione un estudiante</option>
            @foreach ($usuariosEstudiantes as $usuario)
                <option value="{{ $usuario->estudiante->id }}" {{ old('id_est', $pago->id_est ?? '') == $usuario->estudiante->id ? 'selected' : '' }}>
                    {{ $usuario->NombreCompleto }}
                </option>
            @endforeach
        </select>
        <select name="id_adm" id="id_adm" class="form-select @error('id_adm') is-invalid @enderror">
            <option value="">Seleccione un administrador</option>
            @foreach ($usuariosAdministrador as $usuario)
                <option value="{{ $usuario->administrador->id }}" {{ old('id_adm', $pago->id_adm ?? '') == $usuario->administrador->id ? 'selected' : '' }}>
                    {{ $usuario->NombreCompleto }}
                </option>
            @endforeach
        </select>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>