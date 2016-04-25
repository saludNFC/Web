@extends('app')

@section('title')
    <h1>
        Crear nuevo usuario
    </h1>
@stop

@section('content')
    {!! Form::open(['route' => 'usuario.store']) !!}
        @include('users.partials._form', ['submit_text' => 'Crear usuario'])
    {!! Form::close() !!}
@stop
