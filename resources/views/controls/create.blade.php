@extends('app')

@section('title')
    <h1>
        Crear nuevo control
        <small>{{ $patient->apellido}}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => ['paciente.controles.store', $patient->id]]) !!}
        @include('controls.partials._form', ['submit_text' => 'Crear control'])
    {!! Form::close() !!}
@stop
