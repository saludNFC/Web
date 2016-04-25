@extends('app')

@section('title')
    <h1>
        Editar usuario
        <small>{{ $user->name }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuario.update', $user->id]]) !!}
        @include('users.partials._form', ['submit_text' => 'Editar Usuario'])
    {!! Form::close() !!}
@stop
