@extends('app')

@section('title')
    <h1>
        Editar control
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    {!! Form::model($control, ['method' => 'PATCH', 'route' => ['paciente.controles.update', $patient->id, $control->id]]) !!}
        @if($control->control_type === 'Vacunacion')
            @include('controls.partials._vaccination', ['submit_text' => 'Editar Control de Vacunacion'])
        @elseif($control->control_type === 'Crecimiento')
            @include('controls.partials._growth', ['submit_text' => 'Editar Control de Crecimiento y Desarrollo'])
        @elseif($control->control_type === 'Triaje')
            @include('controls.partials._triage', ['submit_text' => 'Editar Control de Triaje'])
        @elseif($control->control_type === 'Ginecologico')
            @include('controls.partials._ginecologic', ['submit_text' => 'Editar Control Ginecologico'])
        @elseif($control->control_type === 'Geriatrico')
            @include('controls.partials._geriatric', ['submit_text' => 'Editar Control Geriatrico'])
        @endif
    {!! Form::close() !!}
@stop
