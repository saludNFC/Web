<div class="col-md-10">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">

                <!-- Cedula de identidad!!! -->
                <div class="form-group">
                    {!! Form::label('ci', 'Cedula de identidad', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'1234567']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::select('emision',
                            ['Beni' => 'BN',
                            'Chuquisaca' => 'CH',
                            'Cochabamba' => 'CB',
                            'La Paz' => 'LP',
                            'Oruro' => 'OR',
                            'Pando' => 'PA',
                            'Potosi' => 'PT',
                            'Santa Cruz' => 'SC',
                            'Tarija' => 'TJ'], 'La Paz', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- NOMBRES!!! -->
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombres', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Juan']) !!}
                    </div>
                </div>

                <!-- APELLIDOS!!! -->
                <div class="form-group">
                    {!! Form::label('apellido', 'Apellidos', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Perez']) !!}
                    </div>
                </div>

                <!-- SEXO!!! -->
                <div class="form-group">
                    {!! Form::label('Sexo', 'Sexo', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('sexo',
                            ['Masculino' => 'Masculino',
                            'Femenino' => 'Femenino'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- GRUPO SANGUINEO -->
                <div class="form-group">
                    {!! Form::label('grupo_sanguineo', 'Grupo Sanguíneo', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('grupo_sanguineo',
                            ['A RH +' => 'A RH +',
                            'A RH -' => 'A RH -',
                            'B RH +' => 'B RH +',
                            'B RH -' => 'B RH -',
                            'O RH +' => 'O RH +',
                            'O RH -' => 'O RH -',
                            'AB RH +' => 'AB RH +',
                            'AB RH -' => 'AB RH -'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- FECHA DE NACIMIENTO!!! -->
                <div class="form-group">
                    {!! Form::label('fecha_nac', 'Fecha de nacimiento', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('fecha_nac', '31-01-1950', ['class'=>'form-control', 'placeholder' => 'Fecha de nacimiento', 'id'=>'datepicker']) !!}
                    </div>
                </div>

                <!-- LUGAR DE NACIMIENTO!!! -->
                <div class="form-group">
                    {!! Form::label('lugar_nac', 'Lugar de nacimiento', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
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
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! link_to_route('paciente.index', 'Cancelar', [], ['class' => 'btn btn-default']) !!}
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </form>
    </div>
</div>

@include('errors.patientform')
