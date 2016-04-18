@extends('app')

@section('title')
    <h1>
        Crear nuevo paciente
        <small>abcdefghijklmnopqrstuvwxyz</small>
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => 'paciente.store']) !!}
        @include('patients.partials._form', ['submit_text' => 'Crear paciente'])
    {!! Form::close() !!}
@stop
