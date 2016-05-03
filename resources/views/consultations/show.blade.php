@extends('app')

@section('content')
    @include('patients.partials._patientDetails')

    <div class="">
        <p>Anamnesis: {{ $consultation->anamnesis }}</p>
        <p>Examen físico: {{ $consultation->physical_exam }}</p>
        <p>Diagnostico: {{ $consultation->diagnosis }}</p>
        <p>Tratamiento: {{ $consultation->treatment }}</p>
        <p>Justificacion: {{ $consultation->justification }}</p>
        <p>Fecha de creacion de la consulta medica: {{ $consultation->created_at }}</p>
        <p>Fecha de ultima modificacion de la consulta medica: {{ $consultation->updated_at }}</p>
        <p>Profesional responsable: {{ $consultation->user->name }}</p>
    </div>

    @can('update_consultation', $consultation)
        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.consultas.destroy', $patient->id, $consultation->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.consultas.edit', 'Editar', [$patient->id, $consultation->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
    @endcan
@stop
