<div class="col-md-10">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">

                <!-- TIPO DE CONTROL -->
                <div class="form-group">
                    {!! Form::label('control_type', 'Tipo de control', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('control_type',
                            ['Temperatura' => 'Temperatura',
                            'Vacunacion' => 'Vacunacion',
                            'Crecimiento' => 'Crecimiento',
                            'Peso' => 'Peso',
                            'Sexualidad' => 'Sexualidad',
                            'Gerontología' => 'Gerontología'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- VALOR -->
                <div class="form-group">
                    {!! Form::label('value', 'Valor', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::number('value', null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <!-- NOTES -->
                <div class="form-group">
                    {!! Form::label('note', 'Anotaciones', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('note', null, ['class'=>'form-control', 'placeholder'=>'Describa el control del paciente']) !!}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button class="btn btn-default">Cancelar</button>
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </form>
    </div>
</div>

@include('errors.patientform')
