@extends('app')

@section('title')
    <h1>
        Detalles paciente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    <div class="container">

        <p>Nombres: {{ $patient->nombre }}</p>
        <p>Apellidos: {{ $patient->apellido }}</p>
        <p>Sexo: {{ $patient->sexo }}</p>
        <p>Fecha de nacimiento: {{ $patient->fecha_nac }}</p>
        <p>Lugar de nacimiento: {{ $patient->lugar_nac }}</p>
        <p>Grupo sanguineo: {{ $patient->grupo_sanguineo }}</p>

        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.destroy', $patient->id]]) !!}
            <div class="form-group btn-group" role="group">
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                {!! link_to_route('paciente.edit', 'Editar', [$patient->id], ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

        <hr>

        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">Antecedentes</a></li>
                <li role="presentation"><a href="#control" aria-controls="control" role="tab" data-toggle="tab">Controles y monitoreos</a></li>
                <li role="presentation"><a href="#consultation" aria-controls="consultation" role="tab" data-toggle="tab">Consultas médicas</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="history">
                    @include('histories.index')
                </div>
                <div role="tabpanel" class="tab-pane" id="control">
                    @include('controls.index')
                </div>
                <div role="tabpanel" class="tab-pane" id="consultation">
                    @include('consultations.index')
                </div>
            </div>
        </div>

        <p>
            {!! link_to_route('paciente.index', 'Volver a lista de pacientes') !!}
        </p>
    </div>
@stop
