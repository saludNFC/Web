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

        @if (count($consultation->revisionHistory) > 0)
            <h3>HISTORIAL DE MODIFICACIONES</h3>
            <br>
            @foreach($consultation->revisionHistory as $history )
                <li>{{ $history->userResponsible()->name }} cambió {{ $history->fieldName() }} de <u>"{{ $history->oldValue() }}"</u> a <b>"{{ $history->newValue() }}"</b></li>
            @endforeach
            <br>
            <br>
        @endif
    </div>

    @can('update_consultation', $consultation)
        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.consultas.destroy', $patient->historia, $consultation->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.consultas.edit', 'Editar', [$patient->historia, $consultation->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
    @endcan
@stop
