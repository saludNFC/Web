@extends('app')

@section('title')
    <h1>
        Editar paciente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($patient, ['method' => 'PATCH', 'route' => ['paciente.update', $patient->id]]) !!}
        @include('patients.partials._form', ['submit_text' => 'Editar Paciente'])
    {!! Form::close() !!}
@stop
