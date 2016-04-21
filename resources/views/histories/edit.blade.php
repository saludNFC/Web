@extends('app')

@section('title')
    <h1>
        Editar antecedente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')

    @if($history->history_type === 'familiar')
        {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
            @include('histories.partials._familiar', ['submit_text' => 'Editar Antecedente Familiar'])
        {!! Form::close() !!}

    @elseif($history->history_type === 'personal')
        {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
            @include('histories.partials._personal', ['submit_text' => 'Editar Antecedente Personal'])
        {!! Form::close() !!}

    @elseif($history->history_type === 'medicamentos')
        {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
            @include('histories.partials._personal', ['submit_text' => 'Editar Antecedente de Medicamentos'])
        {!! Form::close() !!}
    @endif

@stop
