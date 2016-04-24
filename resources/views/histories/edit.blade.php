@extends('app')

@section('title')
    <h1>
        Editar antecedente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')

    @if($history->history_type === 'Familiar')
        {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
            @include('histories.partials._familiar', ['submit_text' => 'Editar Antecedente Familiar'])
        {!! Form::close() !!}

    @elseif($history->history_type === 'Personal')
        {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
            @include('histories.partials._personal', ['submit_text' => 'Editar Antecedente Personal'])
        {!! Form::close() !!}

    @elseif($history->history_type === 'Medicamentos')
        {!! Form::model($history, ['method' => 'PATCH', 'route' => ['paciente.antecedentes.update', $patient->id, $history->id]]) !!}
            @include('histories.partials._medicines', ['submit_text' => 'Editar Antecedente de Medicamentos'])
        {!! Form::close() !!}
    @endif

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
