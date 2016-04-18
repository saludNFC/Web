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
@stop
