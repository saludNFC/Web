@extends('app')

@section('content')
    @include('patients.partials._patientDetails')

    <div class="">
        <p>Tipo de Control: {{ $control->control_type }}</p>
        <p>Vacuna: {{ $control->vaccine }}</p>
        <p>Via: {{ $control->via }}</p>
        <p>Dosis: {{ $control->dosis }}</p>
        <p>Peso: {{ $control->weight }}</p>
        <p>Altura: {{ $control->height }}</p>
        <p>Temperatura: {{ $control->temperature }}</p>
        <p>Frecuencia Cardiaca: {{ $control->heart_rate }} latidos por minuto</p>
        <p>Presion arterial: {{ $control->sistole }} / {{ $control->diastole }}</p>
        <p>Tipo de valoracion geriatrica: {{ $control->geriatric_type }}</p>
        <p>Anotaciones: {{ $control->notes }}</p>
        <p>Fecha de creacion del control: {{ $control->created_at }}</p>
        <p>Fecha de ultima modificacion de antecedente: {{ $control->updated_at }}</p>
        <p>Profesional responsable: {{ $control->user->name }}</p>
    </div>

    @can('update_control', $control)
        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.controles.destroy', $patient->id, $control->id ]]) !!}
            <div class="form-group btn-group" role="group">
                {!! link_to_route('paciente.controles.edit', 'Editar', [$patient->id, $control->id], ['class' => 'btn btn-primary']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
    @endcan
@stop
