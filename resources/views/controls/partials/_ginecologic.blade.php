<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control Ginecológico</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form></form>

    <div class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Ginecologico') !!}

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

            <div class="form-group{{ $errors->any() ? ($errors->has('last_menst')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('last_menst', 'Fecha de ultima menstruación', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('last_menst', null, ['class'=>'form-control datepicker', 'placeholder' => 'Fecha de última menstruación', 'id'=>'datepicker']) !!}

                    @if($errors->has('last_menst'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_menst') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('last_mamo')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('last_mamo', 'Fecha de última mamografía', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('last_mamo', null, ['class'=>'form-control datepicker', 'placeholder' => 'Fecha de última mamografía', 'id'=>'datepicker']) !!}
                    @if($errors->has('last_mamo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_mamo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('last_papa')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('last_papa', 'Fecha de último papanicolau', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('papa', null, ['class'=>'form-control datepicker', 'placeholder' => 'Fecha de último papanicolau', 'id'=>'datepicker']) !!}
                    @if($errors->has('last_papa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_papa') }}</strong>
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
