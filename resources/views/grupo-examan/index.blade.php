@extends('layouts.app')

@section('template_title')
    Grupo Examen
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grupo Examen') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grupo-examen.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Estado</th>
									<th >Fecha Inicio</th>
									<th >Fecha Fin</th>
									<th >Capacidad</th>
									<th >Fecha Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupoExamen as $grupoExaman)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $grupoExaman->estado }}</td>
										<td >{{ $grupoExaman->fecha_inicio }}</td>
										<td >{{ $grupoExaman->fecha_fin }}</td>
										<td >{{ $grupoExaman->capacidad }}</td>
										<td >{{ $grupoExaman->fecha_hora }}</td>

                                            <td>
                                                <form action="{{ route('grupo-examen.destroy', $grupoExaman->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupo-examen.show', $grupoExaman->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupo-examen.edit', $grupoExaman->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $grupoExamen->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
