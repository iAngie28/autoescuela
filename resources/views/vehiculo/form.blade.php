<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="placa" class="form-label">{{ __('Placa') }}</label>
            <input type="text" name="placa" class="form-control @error('placa') is-invalid @enderror" value="{{ old('placa', $vehiculo?->placa) }}" id="placa" placeholder="Placa">
            {!! $errors->first('placa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="modelo" class="form-label">{{ __('Modelo') }}</label>
            <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo', $vehiculo?->modelo) }}" id="modelo" placeholder="Modelo">
            {!! $errors->first('modelo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="caracteristicas" class="form-label">{{ __('Caracteristicas') }}</label>
            <input type="text" name="caracteristicas" class="form-control @error('caracteristicas') is-invalid @enderror" value="{{ old('caracteristicas', $vehiculo?->caracteristicas) }}" id="caracteristicas" placeholder="Caracteristicas">
            {!! $errors->first('caracteristicas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror">
            <option value="">Seleccione un tipo de vehiculo</option>
            @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ old('tipo') == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
        </select>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>