<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control de crecimiento y desarrollo</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form></form>

    <div class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Triaje') !!}

            <div class="form-group{{ $errors->any() ? ($errors->has('created_at') ? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('created_at', 'Fecha de registro', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('created_at', $control->created_at, ['class'=>'form-control datepicker', 'placeholder' => 'Fecha de registro']) !!}
                    @if($errors->has('created_at'))
                        <span class="help-block">
                            <strong>{{ $errors->first('created_at') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->any() ? ($errors->has('temperature')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('temperature', 'Temperatura', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::number('temperature', null, ['class'=>'form-control', 'placeholder'=>'Temperatura del paciente en °C', 'step' => 'any']) !!}

                    @if($errors->has('temperature'))
                        <span class="help-block">
                            <strong>{{ $errors->first('temperature') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('heart_rate')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('heart_rate', 'Frecuencia cardiaca', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::number('heart_rate', null, ['class'=>'form-control', 'placeholder' => 'Frecuencia cardíaca del paciente en latidos por minuto']) !!}
                    @if($errors->has('heart_rate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('heart_rate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('', 'Presión arterial', ['class' => 'col-md-3 control-label']) !!}
                <div class="row col-md-9">
                    <div class="col-md-6{{ $errors->any() ? ($errors->has('sistole')? ' has-error' : ' has-success') : '' }}">
                        {!! Form::number('sistole', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6 push-left{{ $errors->any() ? ($errors->has('vaccine')? ' has-error' : ' has-success') : '' }}">
                        {!! Form::number('diastole', null, ['class'=>'form-control']) !!}
                    </div>

                    @if($errors->has('sistole'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sistole') }}</strong>
                        </span>
                    @elseif($errors->has('diastole'))
                        <span class="help-block">
                            <strong>{{ $errors->first('diastole') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! link_to_route('paciente.show', 'Cancelar', [$patient->historia], ['class' => 'btn btn-default']) !!}
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>

@include('errors.form_errors')
