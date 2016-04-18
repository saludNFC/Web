@extends('app')

@section('title')
    <h1>
        Crear nuevo antecedente
        <small>{{ $patient->apellido}}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => ['paciente.antecedentes.store', $patient->id]]) !!}
        @include('histories.partials._form', ['submit_text' => 'Crear antecedente'])
    {!! Form::close() !!}
@stop
