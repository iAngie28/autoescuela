<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="c_i" class="form-label">{{ __('Ci') }}</label>
            <input type="text" name="CI" class="form-control @error('CI') is-invalid @enderror" value="{{ old('CI', $usuario?->CI) }}" id="c_i" placeholder="Ci">
            {!! $errors->first('CI', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user" class="form-label">{{ __('User') }}</label>
            <input type="text" name="user" class="form-control @error('user') is-invalid @enderror" value="{{ old('user', $usuario?->user) }}" id="user" placeholder="User">
            {!! $errors->first('user', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_completo" class="form-label">{{ __('Nombrecompleto') }}</label>
            <input type="text" name="NombreCompleto" class="form-control @error('NombreCompleto') is-invalid @enderror" value="{{ old('NombreCompleto', $usuario?->NombreCompleto) }}" id="nombre_completo" placeholder="Nombrecompleto">
            {!! $errors->first('NombreCompleto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sexo" class="form-label">{{ __('Sexo') }}</label>
            <input type="text" name="sexo" class="form-control @error('sexo') is-invalid @enderror" value="{{ old('sexo', $usuario?->sexo) }}" id="sexo" placeholder="Sexo">
            {!! $errors->first('sexo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $usuario?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $usuario?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!--<i class="fa fa-h-square" aria-hidden="true"></i><div class="form-group mb-2 mb20">
            <label for="id_rol" class="form-label">{{ __('Id Rol') }}</label>
            <input type="text" name="id_rol" class="form-control @error('id_rol') is-invalid @enderror" value="{{ old('id_rol', $usuario?->id_rol) }}" id="id_rol" placeholder="Id Rol">
            {!! $errors->first('id_rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div -->
        <select name="id_rol" id="id_rol" class="form-select @error('id_rol') is-invalid @enderror">
            <option value="">Seleccione un rol</option>
            @foreach ($roles as $rol)
                <option value="{{ $rol->id }}" {{ old('id_rol') == $rol->id ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('id_rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>