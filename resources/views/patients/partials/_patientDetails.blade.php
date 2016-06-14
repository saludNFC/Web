<div class="row">
    <div class="col-sm-7">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Paciente</h3>

                @can('update_patient', $patient)
                    <div class="box-tools pull-right">
                        <div class="btn-group">
                            {!! Html::decode(link_to_route('paciente.edit', '<i class="fa fa-pencil"></i>', [$patient->historia], ['class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Editar'])) !!}
                        </div>
                    </div>
                @endcan
            </div>
            <div class="box-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">NOMBRES:</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{ $patient->nombre }} {{ $patient->apellido }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">FECHA DE NACIMIENTO:</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{ $patient->fecha_nac}} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">LUGAR DE NACIMIENTO:</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{ $patient->lugar_nac}} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">GRUPO SANGUÍNEO:</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{ $patient->grupo_sanguineo }} </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($patient->contact)
        <div class="col-sm-5">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Contacto de emergencia</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nombre:</label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $patient->contact->name }} {{ $patient->contact->lastname }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Relación de parentesco:</label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $patient->contact->relationship }} </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Telefono:</label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $patient->contact->phone }} </p>
                            </div>
                        </div>
                    </form>
                    <br/>
                </div>
            </div>
        </div>
    @endif
</div>
