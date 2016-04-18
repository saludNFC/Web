@extends('app')

@section('content')
        <h2>Paciente</h2>
        {{ $patient->nombre }} {{ $patient->apellido }}
        <h2>Antecedente</h2>
        {{ $consultation->id }}
        {{ $consultation->anamnesis }}
        {{ $consultation->physical_exam }}
        {{ $consultation->diagnosis }}
        {{ $consultation->treatment }}
        {{ $consultation->justification }}

        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.consultas.destroy', $patient->id, $consultation->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.consultas.edit', 'Editar', [$patient->id, $consultation->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
@stop
