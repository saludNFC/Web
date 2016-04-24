@extends('app')

@section('title')
    <h1>
        Editar consulta medica
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($consultation, ['method' => 'PATCH', 'route' => ['paciente.consultas.update', $patient->id, $consultation->id]]) !!}
        @include('consultations.partials._form', ['submit_text' => 'Editar Consulta Medica'])
    {!! Form::close() !!}

    @if( $errors->any())
        <div class="alert alert-danger">
            @foreach( $errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
            @endforeach
        </div>
    @endif
@stop
