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
@stop
