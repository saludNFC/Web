<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear antecedente personal</h3>
    </div>
    <form></form>
    <div role="form" class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('history_type', 'Personal') !!}
            <div class="form-group{{ $errors->any() ? ($errors->has('type_personal')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('type_personal', 'Tipo de antecedente personal', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::select('type_personal',
                        ['Alergia' => 'Alergia',
                        'Enfermedad' => 'Enfermedad',
                        'Cirugia' => 'Cirugia'], null, ['class' => 'form-control']) !!}
                    @if ($errors->has('type_personal'))
                        <span class="help-block">
                            <strong>{{ $errors->first('type_personal') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('description')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('description', 'Descripcion', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Especifique detalles de la alergia, enfermedad o cirugia', 'rows' => '3']) !!}
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
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
