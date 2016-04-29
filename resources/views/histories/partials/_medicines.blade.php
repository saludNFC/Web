<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear antecedente de medicamentos</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form></form>

    <div role="form" class='form-horizontal'>
        <div class="box-body">
            {!! Form::hidden('history_type', 'Medicamentos') !!}
            <div class="form-group{{ $errors->any() ? ($errors->has('med')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('med', 'Nombre del Medicamento', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('med', null, ['class'=>'form-control', 'placeholder'=>'Por ejemplo: Aceclofenaco 20mg, Naprilene 5mg']) !!}
                    @if($errors->has('med'))
                        <span class="help-block">
                            <strong>{{ $errors->first('med') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('via')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('via', 'Vía de administración', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::select('via',
                        ['Oral' => 'Oral',
                        'Sublingual' => 'Sublingual',
                        'Parenteral' => 'Parenteral',
                        'Rectal' => 'Rectal',
                        'Topica' => 'Topica',
                        'Percutanea' => 'Percutanea'], 'Oral', ['class' => 'form-control']) !!}
                    @if($errors->has('via'))
                        <span class="help-block">
                            <strong>{{ $errors->first('via') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->any() ? ($errors->has('date_ini')? ' has-error' : ' has-success') : '' }}">
                {!! Form::label('date_ini', 'Fecha de inicio de administración', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('date_ini', '31-01-1950', ['class'=>'form-control', 'id'=>'datepicker']) !!}
                    @if($errors->has('date_ini'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_ini') }}</strong>
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
