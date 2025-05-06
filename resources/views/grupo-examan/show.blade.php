@extends('layouts.app')

@section('template_title')
    {{ $grupoExaman->name ?? __('Show') . " " . __('Grupo Examan') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Grupo Examan</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('grupo-examen.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $grupoExaman->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Inicio:</strong>
                                    {{ $grupoExaman->fecha_inicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Fin:</strong>
                                    {{ $grupoExaman->fecha_fin }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Capacidad:</strong>
                                    {{ $grupoExaman->capacidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Hora:</strong>
                                    {{ $grupoExaman->fecha_hora }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
