<div class="col-md-10">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">

                <!-- TIPO DE ANTECEDENTE -->
                <div class="form-group">
                    {!! Form::label('history_type', 'Tipo de antecedente', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('history_type',
                            ['Familiar' => 'Familiar',
                            'Medicamentos' => 'Medicamentos',
                            'Personal' => 'Personal'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <!-- NOTES -->
                <div class="form-group">
                    {!! Form::label('story', 'Detalles', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('story', 'Describa el antecedente del paciente', ['class'=>'form-control', 'placeholder'=>'1234567']) !!}
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
