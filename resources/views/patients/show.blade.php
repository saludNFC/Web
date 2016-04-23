<!-- DEBE HABER UNA MEJOR MANERA DE VERIFICAR SI EL PACIENTE TIENE O NO REGISTROS DE CUALQUIER TIPO QUE ARCHIVO POR ARCHIVO ¬¬ -->
<!-- Pero no tengo tiempo para pensar -->
<!-- Tal vez ni siquiera se necesite pensar -->
<!-- Tal vez se necesita un poco de sentido comun -->
<!-- But I have lack of it -->
<!-- Nevermind, if it works it ain't stupid, ha! -->

@extends('app')

@section('title')
    <h1>
        Detalles paciente
        <small>{{ $patient->apellido }}, {{ $patient->nombre }}</small>
    </h1>
@stop

@section('content')
    <div class="container">
        @include('patients.partials._patientDetails')
        <hr>
        <div class="nav-tabs-custom">

            <!-- TABS -->
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="dropdown active">
                    <a href="#" id="histories" class="dropdown-toggle" data-toggle="dropdown" aria-controls="histories-contents" aria-expanded="false">Antecedentes <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="histories" id="histories-contents">
                        <li><a href="#familiar" role="tab" id="familiar-tab" data-toggle="tab" aria-controls="familiar" aria-expanded="true">Familiares</a></li>
                        <li><a href="#personal" role="tab" id="personal-tab" data-toggle="tab" aria-controls="personal" aria-expanded="false">Personales</a></li>
                        <li><a href="#medicine" role="tab" id="medicine-tab" data-toggle="tab" aria-controls="medicine" aria-expanded="false">De Medicamentos</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a href="#" id="controls" class="dropdown-toggle" data-toggle="dropdown" aria-controls="controls-contents" aria-expanded="false">Controles y Monitoreos <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="controls" id="controls-contents">
                        <li><a href="#vaccination" role="tab" id="vaccination-tab" data-toggle="tab" aria-controls="vaccination" aria-expanded="true">Vacunacion</a></li>
                        <li><a href="#growth" role="tab" id="growth-tab" data-toggle="tab" aria-controls="growth" aria-expanded="false">Crecimiento y desarrollo</a></li>
                        <li><a href="#triage" role="tab" id="triage-tab" data-toggle="tab" aria-controls="triage" aria-expanded="false">Triaje</a></li>
                        <li><a href="#geriatric" role="tab" id="geriatric-tab" data-toggle="tab" aria-controls="geriatric" aria-expanded="false">Geriatrico</a></li>
                    </ul>
                </li>
                <li role="presentation"><a href="#consultation" aria-controls="consultation" role="tab" data-toggle="tab">Consultas médicas</a></li>
            </ul>

            <!-- Tabs Contents -->
            <div id="myTabContent" class="tab-content">
                <!-- ANTECEDENTES -->
                <div role="tabpanel" class="tab-pane fade active in" id="familiar" aria-labelledby="familiar-tab">
                    @include('histories.index_familiar')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="personal" aria-labelledby="personal-tab">
                    @include('histories.index_personal')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="medicine" aria-labelledby="medicine-tab">
                    @include('histories.index_medicine')
                </div>

                <!-- CONTROLES -->
                <div role="tabpanel" class="tab-pane fade in" id="vaccination" aria-labelledby="vaccination-tab">
                    @include('controls.index_vaccination')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="growth" aria-labelledby="growth-tab">
                    @include('controls.index_growth')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="triage" aria-labelledby="triage-tab">
                    @include('controls.index_triage')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="geriatric" aria-labelledby="geriatric-tab">
                    @include('controls.index_geriatric')
                </div>
                <div role="tabpanel" class="tab-pane" id="consultation">
                    @include('consultations.index')
                </div>
            </div>
        </div>

        <p>{!! link_to_route('paciente.index', 'Volver a lista de pacientes') !!}</p>
    </div>
@stop
