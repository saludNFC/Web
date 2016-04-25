@extends('app')

@section('title')
    <h1>
        Abrir nueva Historia Clínica
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => 'paciente.store']) !!}
        @include('patients.partials._form', ['submit_text' => 'Crear paciente'])
    {!! Form::close() !!}
@stop
