@extends('app')

@section('title')
    <h1>
        Editar antecedente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
        @include('histories.partials._form', ['submit_text' => 'Editar Antecedente'])
    {!! Form::close() !!}
@stop
