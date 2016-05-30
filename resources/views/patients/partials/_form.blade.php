<!-- DEBE HABER UNA MEJOR MANERA DE MOSTRAR LOS ERRORES EN EL FORMULARIO -->
<!-- UNA MEJOR MANERA APARTE DE REPETIR LAS MISMAS LINEAS DE CODIGO EN CADA form-group -->
<!-- ¬¬ -->

<div class="col-md-10 col-md-offset-1">
    <form class="form-horizontal"></form>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Generales del paciente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="form-horizontal">
            <div class="box-body">

                <!-- CEDULA DE IDENTIDAD -->
                <div class="form-group{{ $errors->any() ? ($errors->has('ci') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('ci', 'Cedula de identidad', ['class' => 'col-sm-2 control-label']) !!}

                    <div class="col-sm-10">
                        <div class="col-sm-9">
                            {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'1234567']) !!}
                            @if ($errors->has('ci'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ci') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            {!! Form::select('emision',
                                ['BN' => 'BN',
                                'CH' => 'CH',
                                'CB' => 'CB',
                                'LP' => 'LP',
                                'OR' => 'OR',
                                'PA' => 'PA',
                                'PT' => 'PT',
                                'SC' => 'SC',
                                'TJ' => 'TJ'], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <!-- NOMBRES -->
                <div class="form-group{{ $errors->any() ? ($errors->has('nombre') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('nombre', 'Nombres', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Juan']) !!}
                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- APELLIDOS -->
                <div class="form-group{{ $errors->any() ? ($errors->has('apellido') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('apellido', 'Apellidos', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Perez Gomez']) !!}
                            @if ($errors->has('apellido'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- <div class="row"> -->

                    <!-- SEXO -->
                    <div class="form-group col-sm-6{{ $errors->any() ? ($errors->has('sexo') ? ' has-error' : ' has-success') : ''}}">
                        {!! Form::label('sexo', 'Sexo', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            <div class="col-sm-11" style="padding-left:9px;">
                                {!! Form::select('sexo',
                                    ['Masculino' => 'Masculino',
                                    'Femenino' => 'Femenino'], null, ['class' => 'form-control']) !!}

                                @if($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- GRUPO SANGUINEO -->
                    <div class="form-group col-sm-6 pull-right{{ $errors->any() ? ($errors->has('grupo_sanguineo') ? ' has-error' : ' has-success') : ''}}">
                        {!! Form::label('grupo_sanguineo', 'Grupo Sanguíneo', ['class' => 'col-sm-5 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::select('grupo_sanguineo',
                                ['A RH +' => 'A RH +',
                                'A RH -' => 'A RH -',
                                'B RH +' => 'B RH +',
                                'B RH -' => 'B RH -',
                                'O RH +' => 'O RH +',
                                'O RH -' => 'O RH -',
                                'AB RH +' => 'AB RH +',
                                'AB RH -' => 'AB RH -'], null, ['class' => 'form-control']) !!}
                            @if($errors->has('grupo_sanguineo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('grupo_sanguineo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                <!-- </div> -->

                <!-- FECHA DE NACIMIENTO -->
                <div class="form-group{{ $errors->any() ? ($errors->has('fecha_nac') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('fecha_nac', 'Fecha de nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            {!! Form::text('fecha_nac', null, ['class'=>'form-control', 'placeholder' => 'Fecha de nacimiento', 'id'=>'datepicker']) !!}
                            @if($errors->has('fecha_nac'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha_nac') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- LUGAR DE NACIMIENTO -->
                <div class="form-group{{ $errors->any() ? ($errors->has('lugar_nac') ? ' has-error' : ' has-success') : ''}}">
                    {!! Form::label('lugar_nac', 'Lugar de nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            {!! Form::select('lugar_nac',
                                ['Beni' => 'Beni',
                                'Chuquisaca' => 'Chuquisaca',
                                'Cochabamba' => 'Cochabamba',
                                'La Paz' => 'La Paz',
                                'Oruro' => 'Oruro',
                                'Pando' => 'Pando',
                                'Potosi' => 'Potosi',
                                'Santa Cruz' => 'Santa Cruz',
                                'Tarija' => 'Tarija'], 'La Paz', ['class' => 'form-control']) !!}

                            @if($errors->has('lugar_nac'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lugar_nac') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! Html::decode( link_to_route('paciente.index', '<i class="fa fa-close"></i>&nbsp;Cancelar', [], ['class' => 'btn btn-default'])) !!}
                {!! Form::button('<i class="fa fa-save"></i>&nbsp;' . $submit_text, ['class'=>'btn btn-primary', 'role' => 'button', 'type' => 'submit']) !!}
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>

@include('errors.form_errors')
