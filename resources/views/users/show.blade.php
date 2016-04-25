@extends('app')

@section('title')
    <h1>
        Detalles del usuario
        <small>{{ $user->name }}</small>
    </h1>
@stop

@section('content')
    <div class="container">
        Nombre: {{ $user->name }}
        Correo Electronico: {{ $user->email }}

        {!! Form::open(['method' => 'DELETE', 'route' => ['usuario.destroy', $user->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('usuario.edit', 'Editar', [$user->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}

        <p>{!! link_to_route('usuario.index', 'Volver a lista de usuarios') !!}</p>
    </div>
@stop
