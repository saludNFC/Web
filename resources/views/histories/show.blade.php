@extends('app')

@section('content')
    @include('patients.partials._patientDetails')

    <div class="">
        <p>Tipo de Antecedente: {{ $history->history_type }}</p>
        <p>Relacion de parentesco: {{ $history->grade }}</p>
        <p>Enfermedad: {{ $history->illness }}</p>
        <p>Tipo de Antecedente Personal: {{ $history->personal_type }}</p>
        <p>Medicación: {{ $history->med }}</p>
        <p>Via de administración: {{ $history->via }}</p>
        <p>Fecha de primera administracion: {{ $history->date_ini }}</p>
        <p>Descripcion: {{ $history->description }}</p>
        <p>Fecha de creacion de antecedente: {{ $history->created_at }}</p>
        <p>Fecha de ultima modificacion de antecedente: {{ $history->updated_at }}</p>
        <p>Profesional responsable: {{ $history->user->name }}</p>
    </div>

    @can('update_history', $history)
        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.antecedentes.destroy', $patient->historia, $history->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.antecedentes.edit', 'Editar', [$patient->historia, $history->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar antecedente', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
    @endcan
@stop
