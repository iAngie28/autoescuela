@extends('layouts.app')

@section('template_title')
    {{ $vehiculo->name ?? __('Show') . " " . __('Vehiculo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vehiculo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('vehiculos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Placa:</strong>
                                    {{ $vehiculo->placa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Modelo:</strong>
                                    {{ $vehiculo->modelo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Caracteristicas:</strong>
                                    {{ $vehiculo->caracteristicas }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo:</strong>
                                    {{ $vehiculo->tipo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
