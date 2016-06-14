@extends('app')

@section('title')
    <h1>
        Crear contacto del paciente
        <small>{{ $patient->apellido}}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($contact = new App\Contact, ['route' => ['paciente.contacto.store', $patient->historia]]) !!}
        @include('contacts.partials._form', ['submit_text' => 'Crear contacto'])
    {!! Form::close() !!}
@stop
