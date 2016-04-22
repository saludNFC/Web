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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">Antecedentes</a></li>
                <li role="presentation"><a href="#control" aria-controls="control" role="tab" data-toggle="tab">Controles y monitoreos</a></li>
                <li role="presentation"><a href="#consultation" aria-controls="consultation" role="tab" data-toggle="tab">Consultas médicas</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="history">
                    @include('histories.index')
                </div>
                <div role="tabpanel" class="tab-pane" id="control">
                    @include('controls.index')
                </div>
                <div role="tabpanel" class="tab-pane" id="consultation">
                    @include('consultations.index')
                </div>
            </div>
        </div>

        <p>
            {!! link_to_route('paciente.index', 'Volver a lista de pacientes') !!}
        </p>
        <hr>
        <hr>
        <hr>

    </div>
    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="dropdown active">
                <a href="#" id="histories" class="dropdown-toggle" data-toggle="dropdown" aria-controls="histories-contents" aria-expanded="false">Antecedentes <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="histories" id="histories-contents">
                    <li><a href="#familiar" role="tab" id="familiar-tab" data-toggle="tab" aria-controls="familiar" aria-expanded="true">Familiares</a></li>
                    <li><a href="#personal" role="tab" id="personal-tab" data-toggle="tab" aria-controls="personal" aria-expanded="false">Personales</a></li>
                    <li><a href="#medicine" role="tab" id="medicine-tab" data-toggle="tab" aria-controls="medicine" aria-expanded="false">De Medicamentos</a></li>
                </ul>
            </li>
            <li role="presentation" class="">
                <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Algo</a>
            </li>
            <li role="presentation">
                <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Algo mas</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="home" aria-labelledby="home-tab">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade active in" id="familiar" aria-labelledby="familiar-tab">
                <p>Antecedentes Familiares del paciente</p>
                @include('histories.index_familiar')
            </div>
            <div role="tabpanel" class="tab-pane fade" id="personal" aria-labelledby="personal-tab">
                <p>Antecedentes personales del paciente</p>
                @include('histories.index_personal')
            </div>
            <div role="tabpanel" class="tab-pane fade" id="medicine" aria-labelledby="medicine-tab">
                <p>Antecedentes personales de medicamentos del paciente</p>
                @include('histories.index_medicine')
            </div>
        </div>
    </div>

@stop
