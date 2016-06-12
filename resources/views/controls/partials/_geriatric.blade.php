<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control geriatrico</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form></form>

    <div class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Geriatrico') !!}

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

            <div class="form-group{{ $errors->any() ? ($errors->has('geriatric_type')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('geriatric_type', 'Tipo de valoracion geriatrica', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::select('geriatric_type',
                        ['Valoracion Medica' => 'Valoracion Medica',
                        'Valoracion Funcional' => 'Valoracion Funcional',
                        'Valoracion Cognitiva' => 'Valoracion Cognitiva',
                        'Valoracion Social' => 'Valoracion Social'], null, ['class' => 'form-control']) !!}

                    @if($errors->has('geriatric_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('geriatric_type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('notes')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('notes', 'Anotaciones', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::textarea('notes', null, ['class'=>'form-control', 'placeholder' => 'Detalle las observaciones y resultados de la valoracion geriatrica', 'rows' => '3']) !!}

                    @if($errors->has('notes'))
                        <span class="help-block">
                            <strong>{{ $errors->first('notes') }}</strong>
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
