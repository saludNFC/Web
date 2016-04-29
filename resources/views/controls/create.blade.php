@extends('app')

@section('title')
    <h1>
        Crear nuevo control
        <small>{{ $patient->apellido}}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Vacunas</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Crecimiento y desarrollo</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Triaje</a></li>
            <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Geriatrico</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                {!! Form::open(['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._vaccination', ['submit_text' => 'Crear control de vacunacion'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                {!! Form::open(['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._growth', ['submit_text' => 'Crear control de crecimiento y desarrollo'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                {!! Form::open(['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._triage', ['submit_text' => 'Crear control de Triaje'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">
                {!! Form::open(['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._geriatric', ['submit_text' => 'Crear control Geriatrico'])
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
@stop
