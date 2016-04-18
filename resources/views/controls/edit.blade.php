@extends('app')

@section('title')
    <h1>
        Editar control
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($control, ['method' => 'PATCH', 'route' => ['paciente.controles.update', $patient->id, $control->id]]) !!}
        @include('controls.partials._form', ['submit_text' => 'Editar Control'])
    {!! Form::close() !!}
@stop