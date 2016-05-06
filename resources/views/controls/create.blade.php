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
            @if($patient->isWomanOldEnough())
                <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Ginecologico</a></li>
            @endif
            @if($patient->isElder())
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Geriatrico</a></li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                {!! Form::model($control = new App\Control, ['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._vaccination', ['submit_text' => 'Crear control de vacunacion'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                {!! Form::model($control = new App\Control, ['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._growth', ['submit_text' => 'Crear control de crecimiento y desarrollo'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                {!! Form::model($control = new App\Control, ['route' => ['paciente.controles.store', $patient->id]]) !!}
                    @include('controls.partials._triage', ['submit_text' => 'Crear control de Triaje'])
                {!! Form::close() !!}
            </div>

            @if($patient->isWomanOldEnough())
                <div class="tab-pane" id="tab_5">
                    {!! Form::model($control = new App\Control, ['route' => ['paciente.controles.store', $patient->id]]) !!}
                        @include('controls.partials._ginecologic', ['submit_text' => 'Crear control Ginecologico'])
                    {!! Form::close() !!}
                </div>
            @endif
            <!-- /.tab-pane -->
            @if($patient->isElder())
                <div class="tab-pane" id="tab_4">
                    {!! Form::model($control = new App\Control, ['route' => ['paciente.controles.store', $patient->id]]) !!}
                        @include('controls.partials._geriatric', ['submit_text' => 'Crear control Geriatrico'])
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
        <!-- /.tab-content -->
    </div>
@stop
