@extends('app')

@section('title')
    <h1>
        Editar antecedente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')

    {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->historia, $history->id]]) !!}
        @if($history->history_type === 'Familiar')
                @include('histories.partials._familiar', ['submit_text' => 'Editar Antecedente Familiar'])

        @elseif($history->history_type === 'Personal')
            @include('histories.partials._personal', ['submit_text' => 'Editar Antecedente Personal'])

        @elseif($history->history_type === 'Medicamentos')
            @include('histories.partials._medicines', ['submit_text' => 'Editar Antecedente de Medicamentos'])
        @endif
    {!! Form::close() !!}
@stop
