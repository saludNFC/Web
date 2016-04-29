<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear antecedente de medicamentos</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <form role="form">
        <div class="box-body">
            {!! Form::hidden('history_type', 'Medicamentos') !!}
            <div class="form-group">
                {!! Form::label('med', 'Nombre del Medicamento') !!}
                {!! Form::text('med', null, ['class'=>'form-control', 'placeholder'=>'Por ejemplo: Aceclofenaco 20mg, Naprilene 5mg']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('via', 'Vía de administración') !!}
                {!! Form::select('via',
                    ['Oral' => 'Oral',
                    'Sublingual' => 'Sublingual',
                    'Parenteral' => 'Parenteral',
                    'Rectal' => 'Rectal',
                    'Topica' => 'Topica',
                    'Percutanea' => 'Percutanea'], 'Oral', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('date_ini', 'Fecha de inicio de administración') !!}
                {!! Form::text('date_ini', '31-01-1950', ['class'=>'form-control', 'id'=>'datepicker']) !!}
            </div>
        </div>
        <div class="box-footer">
            {!! link_to_route('paciente.show', 'Cancelar', [$patient->id], ['class' => 'btn btn-default']) !!}
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>

@include('errors.form_errors')
