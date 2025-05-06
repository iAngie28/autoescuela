<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $examenCategoriaAspira?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="costo" class="form-label">{{ __('Costo') }}</label>
            <input type="text" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $examenCategoriaAspira?->costo) }}" id="costo" placeholder="Costo">
            {!! $errors->first('costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nota_min_pract" class="form-label">{{ __('Nota Min Pract') }}</label>
            <input type="text" name="nota_min_pract" class="form-control @error('nota_min_pract') is-invalid @enderror" value="{{ old('nota_min_pract', $examenCategoriaAspira?->nota_min_pract) }}" id="nota_min_pract" placeholder="Nota Min Pract">
            {!! $errors->first('nota_min_pract', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nota_min_teorica" class="form-label">{{ __('Nota Min Teorica') }}</label>
            <input type="text" name="nota_min_teorica" class="form-control @error('nota_min_teorica') is-invalid @enderror" value="{{ old('nota_min_teorica', $examenCategoriaAspira?->nota_min_teorica) }}" id="nota_min_teorica" placeholder="Nota Min Teorica">
            {!! $errors->first('nota_min_teorica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>