<div class="col-md-10 col-md-offset-1">
    <div class="form-horizontal"></div>
    <!-- Horizontal Form -->
    <div class="box box-default">
        <!-- /.box-header -->
        <form></form>

        <div class="form-horizontal">
            <div class="box-body">
                <!-- ANAMNESIS -->
                <div class="form-group{{ $errors->any() ? ($errors->has('anamnesis')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('anamnesis', 'Anamnesis', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::textarea('anamnesis', null, ['class'=>'form-control', 'placeholder'=>'Anamnesis', 'rows' => '3']) !!}
                        @if($errors->has('anamnesis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('anamnesis') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- EXAMEN FISICO -->
                <div class="form-group{{ $errors->any() ? ($errors->has('physical_exam')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('physical_exam', 'Examen físico', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::textarea('physical_exam', null, ['class'=>'form-control', 'placeholder'=>'Detalle las observaciones despues del examen fisico', 'rows' => '3']) !!}
                        @if($errors->has('physical_exam'))
                            <span class="help-block">
                                <strong>{{ $errors->first('physical_exam') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- DIAGNOSTICO -->
                <div class="form-group{{ $errors->any() ? ($errors->has('diagnosis')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('diagnosis', 'Diagnostico', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::textarea('diagnosis', null, ['class'=>'form-control', 'placeholder'=>'Diagnostico', 'rows' => '3']) !!}
                        @if($errors->has('diagnosis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('diagnosis') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- TREATMENT -->
                <div class="form-group{{ $errors->any() ? ($errors->has('treatment')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('treatment', 'Tratamiento', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::textarea('treatment', null, ['class'=>'form-control', 'placeholder'=>'Tratamiento, receta, indicaciones para el paciente', 'rows' => '3']) !!}
                        @if($errors->has('treatment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('treatment') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- JUSTIFICACION -->
                <div class="form-group{{ $errors->any() ? ($errors->has('justification')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('justification', 'Justificación', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::textarea('justification', null, ['class'=>'form-control', 'placeholder'=>'Justificacion del diagnostico y del tratamiento', 'rows' => '3']) !!}
                        @if($errors->has('justification'))
                            <span class="help-block">
                                <strong>{{ $errors->first('justification') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! link_to_route('paciente.show', 'Cancelar', [$patient->historia], ['class' => 'btn btn-default']) !!}
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

@include('errors.form_errors')
