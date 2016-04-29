<div class="col-md-10 col-md-offset-1">
    <div class="form-horizontal"></div>
    <!-- Horizontal Form -->
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">

                <!-- ANAMNESIS -->
                <div class="form-group">
                    {!! Form::label('anamnesis', 'Anamnesis', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('anamnesis', null, ['class'=>'form-control', 'placeholder'=>'Anamnesis', 'rows' => '3']) !!}
                    </div>
                </div>

                <!-- EXAMEN FISICO -->
                <div class="form-group">
                    {!! Form::label('physical_exam', 'Examen físico', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('physical_exam', null, ['class'=>'form-control', 'placeholder'=>'Detalle las observaciones despues del examen fisico', 'rows' => '3']) !!}
                    </div>
                </div>

                <!-- DIAGNOSTICO -->
                <div class="form-group">
                    {!! Form::label('diagnosis', 'Diagnostico', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('diagnosis', null, ['class'=>'form-control', 'placeholder'=>'Diagnostico', 'rows' => '3']) !!}
                    </div>
                </div>

                <!-- TREATMENT -->
                <div class="form-group">
                    {!! Form::label('treatment', 'Tratamiento', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('treatment', null, ['class'=>'form-control', 'placeholder'=>'Tratamiento, receta, indicaciones para el paciente', 'rows' => '3']) !!}
                    </div>
                </div>

                <!-- JUSTIFICACION -->
                <div class="form-group">
                    {!! Form::label('justification', 'Justificación', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('justification', null, ['class'=>'form-control', 'placeholder'=>'Justificacion del diagnostico y del tratamiento', 'rows' => '3']) !!}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! link_to_route('paciente.show', 'Cancelar', [$patient->id], ['class' => 'btn btn-default']) !!}
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </form>
    </div>
</div>

@include('errors.form_errors')
