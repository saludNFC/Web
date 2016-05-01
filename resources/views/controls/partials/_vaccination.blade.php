<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control de vacunacion</h3>
    </div>
    <form></form>
    <div class="form-horizontal">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Vacunacion') !!}
            <div class="form-group{{ $errors->any() ? ($errors->has('vaccine')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('vaccine', 'Vacuna', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('vaccine', null, ['class'=>'form-control', 'placeholder'=>'Por ejemplo: DCG, Pentavalente, DPT, etc']) !!}
                    @if($errors->has('vaccine'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vaccine') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('via')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('via', 'Via de administración', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::select('via',
                        ['Intra-dermica' => 'Intra-dermica',
                        'Intra-muscular' => 'Intra-muscular',
                        'Oral' => 'Oral',
                        'Subcutanea' => 'Subcutanea'], null, ['class'=>'form-control']) !!}

                    @if($errors->has('via'))
                        <span class="help-block">
                            <strong>{{ $errors->first('via') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('dosis')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('dosis', 'Numero de dosis', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::number('dosis', null, ['class'=>'form-control', 'step' => '1', 'placeholder' => 'Numero de dosis aplicada']) !!}

                    @if($errors->has('dosis'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dosis') }}</strong>
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
