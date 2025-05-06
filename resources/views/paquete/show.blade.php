@extends('layouts.app')

@section('template_title')
    {{ $paquete->name ?? __('Show') . " " . __('Paquete') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Paquete</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('paquetes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cant Class:</strong>
                                    {{ $paquete->cant_class }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Capacidad Est:</strong>
                                    {{ $paquete->capacidad_est }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Costo:</strong>
                                    {{ $paquete->costo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
