@extends('app')

@section('title')
    <h1>
        Lista de pacientes
    </h1>
@stop

@section('content')
    <div class="panel panel-default">
            <div class="panel-body">
        @if( !$patients->count() )
                <p class="alert alert-danger">No hay pacientes registrados</p>
            </div>
    </div>
        @else
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Historia Clínica</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Sexo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Lugar de nacimiento</th>
                    <th>Grupo sanguíneo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->historia }}</td>
                        <td>{{ $patient->apellido }}</td>
                        <td>{{ $patient->nombre }}</td>
                        <td>{{ $patient->sexo }}</td>
                        <td>{{ $patient->fecha_nac->format('d-m-Y') }}</td>
                        <td>{{ $patient->lugar_nac }}</td>
                        <td>{{ $patient->grupo_sanguineo }}</td>
                        <td>
                            <div class="btn-group">
                                {!! Html::decode( link_to_route('paciente.show', '<i class="fa fa-eye"></i>', [$patient->id], ['class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ver Detalles'] )) !!}
                                @can('update_patient', $patient)
                                    {!!  Html::decode( link_to_route('paciente.edit', '<i class="fa fa-pencil"></i>', [$patient->id], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Editar'] )) !!}
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    @endif
@stop
