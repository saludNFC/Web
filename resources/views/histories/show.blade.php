@extends('app')

@section('content')
        <h2>Paciente</h2>
        {{ $patient->nombre }} {{ $patient->apellido }}
        <h2>Antecedente</h2>
        {{ $history->id }}
        {{ $history->patient_id }}
        {{ $history->story }}
        {{ $history->created_at }}
        {{ $history->updated_at }}

        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.antecedentes.destroy', $patient->id, $history->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.antecedentes.edit', 'Editar', [$patient->id, $history->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar antecedente', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
@stop
