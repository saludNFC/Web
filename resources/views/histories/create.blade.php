@extends('app')

@section('title')
    <h1>
        Crear nuevo antecedente
        <small>{{ $patient->apellido}}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Antecedentes familiares</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Antecedentes personales</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Antecedentes de medicamentos</a></li>
    </ul>
    <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                {!! Form::model($history = new App\History, ['route' => ['paciente.antecedentes.store', $patient->historia]]) !!}
                    @include('histories.partials._familiar', ['submit_text' => 'Crear antecedente familiar'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                {!! Form::model($history = new App\History, ['route' => ['paciente.antecedentes.store', $patient->historia]]) !!}
                    @include('histories.partials._personal', ['submit_text' => 'Crear antecedente personal'])
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                {!! Form::model($history = new App\History, ['route' => ['paciente.antecedentes.store', $patient->historia]]) !!}
                    @include('histories.partials._medicines', ['submit_text' => 'Crear antecedente de medicamentos'])
                {!! Form::close() !!}
            </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>

@stop
