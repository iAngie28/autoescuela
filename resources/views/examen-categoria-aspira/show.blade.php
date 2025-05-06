@extends('layouts.app')

@section('template_title')
    {{ $examenCategoriaAspira->name ?? __('Show') . " " . __('Examen Categoria Aspira') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Examen Categoria Aspira</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('examen-categoria-aspiras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $examenCategoriaAspira->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Costo:</strong>
                                    {{ $examenCategoriaAspira->costo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nota Min Pract:</strong>
                                    {{ $examenCategoriaAspira->nota_min_pract }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nota Min Teorica:</strong>
                                    {{ $examenCategoriaAspira->nota_min_teorica }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
