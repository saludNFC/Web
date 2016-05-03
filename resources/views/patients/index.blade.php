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
                    <th>ID</th>
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
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->apellido }}</td>
                        <td>{{ $patient->nombre }}</td>
                        <td>{{ $patient->sexo }}</td>
                        <td>{{ $patient->fecha_nac->format('d-m-Y') }}</td>
                        <td>{{ $patient->lugar_nac }}</td>
                        <td>{{ $patient->grupo_sanguineo }}</td>
                        <td>
                            <div class="btn-group">
                                {!! link_to_route('paciente.show', 'Ver detalles', [$patient->id], ['class' => 'btn btn-default'] ) !!}
                                @can('update_patient', $patient)
                                    {!! link_to_route('paciente.edit', 'Editar', [$patient->id], ['class' => 'btn btn-primary']) !!}
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
