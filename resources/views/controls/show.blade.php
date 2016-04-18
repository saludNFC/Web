@extends('app')

@section('content')
        <h2>Paciente</h2>
        {{ $patient->nombre }} {{ $patient->apellido }}
        <h2>Antecedente</h2>
        {{ $control->id }}
        {{ $control->patient_id }}
        {{ $control->control_type }}
        {{ $control->note }}
        {{ $control->value }}
        {{ $control->created_at }}
        {{ $control->updated_at }}

        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.controles.destroy', $patient->id, $control->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.controles.edit', 'Editar', [$patient->id, $control->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
@stop
