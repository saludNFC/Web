<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear antecedente personal</h3>
    </div>
    <form role="form">
        <div class="box-body">
            {!! Form::hidden('history_type', 'Personal') !!}
            <div class="form-group">
                {!! Form::label('type_personal', 'Tipo de antecedente personal') !!}
                {!! Form::select('type_personal',
                    ['Alergia' => 'Alergia',
                    'Enfermedad' => 'Enfermedad',
                    'Cirugia' => 'Cirugia'], 'Alergia', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Descripcion') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Especifique detalles de la alergia, enfermedad o cirugia']) !!}
            </div>
        </div>
        <div class="box-footer">
            {!! link_to_route('paciente.show', 'Cancelar', [$patient->id], ['class' => 'btn btn-default']) !!}
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>

@include('errors.form_errors')
