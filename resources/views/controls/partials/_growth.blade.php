<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control de crecimiento y desarrollo</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form></form>

    <div class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Crecimiento') !!}
            <div class="form-group{{ $errors->any() ? ($errors->has('weight')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('weight', 'Peso', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::number('weight', null, ['class'=>'form-control', 'placeholder'=>'Peso del paciente en Kg', 'step' => 'any']) !!}

                    @if($errors->has('weight'))
                        <span class="help-block">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('height')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('height', 'Altura', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::number('height', null, ['class'=>'form-control', 'placeholder' => 'Altura del paciente en cm', 'step' => 'any']) !!}

                    @if($errors->has('height'))
                        <span class="help-block">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! link_to_route('paciente.show', 'Cancelar', [$patient->id], ['class' => 'btn btn-default']) !!}
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>

@include('errors.form_errors')
