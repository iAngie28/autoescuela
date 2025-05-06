@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Examen Categoria Aspira
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Examen Categoria Aspira</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('examen-categoria-aspiras.update', $examenCategoriaAspira->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('examen-categoria-aspira.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
