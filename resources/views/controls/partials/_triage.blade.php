<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control de crecimiento y desarrollo</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <form role="form">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Triaje') !!}
            <div class="form-group">
                {!! Form::label('temperature', 'Temperatura') !!}
                {!! Form::number('temperature', null, ['class'=>'form-control', 'placeholder'=>'Temperatura del paciente en °C']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('heart_rate', 'Frecuencia cardiaca') !!}
                {!! Form::number('heart_rate', null, ['class'=>'form-control', 'placeholder' => 'Frecuencia cardíaca del paciente en latidos por minuto']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'Presión arterial') !!}
                <div class="col-md-6">
                    {!! Form::number('sistole', null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-md-6">
                    / {!! Form::number('diastole', null, ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default">Cancelar</button>
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>
