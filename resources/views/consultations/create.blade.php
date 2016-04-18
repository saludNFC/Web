@extends('app')

@section('title')
    <h1>
        Crear nueva consulta medica
        <small>{{ $patient->apellido}}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => ['paciente.consultas.store', $patient->id]]) !!}
        @include('consultations.partials._form', ['submit_text' => 'Crear consulta medica'])
    {!! Form::close() !!}
@stop
