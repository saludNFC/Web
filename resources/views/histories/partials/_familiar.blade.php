<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear antecedente familiar</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <form></form>
    <div class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('history_type', 'Familiar') !!}
            <div class="form-group{{ $errors->any() ? ($errors->has('grade')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('grade', 'Relación de parentesco', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('grade', null, ['class'=>'form-control', 'placeholder'=>'Por ejemplo: Abuelo, padre, madre, etc']) !!}
                    @if($errors->has('grade'))
                        <span class="help-block">
                            <strong>{{ $errors->first('grade') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->any() ? ($errors->has('illness') ? ' has-error' : ' has-success') : ''}}">
                {!! Form::label('illness', 'Antecedente médico', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('illness', null, ['class'=>'form-control', 'placeholder'=>'Antecedente medico del familiar']) !!}
                    @if($errors->has('illness'))
                        <span class="help-block">
                            <strong>{{ $errors->first('illness') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
        </div>
        <div class="box-footer">
            {!! link_to_route('paciente.show', 'Cancelar', $patient->id, ['class' => 'btn btn-default']) !!}
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>

@include('errors.form_errors')
