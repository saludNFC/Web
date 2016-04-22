<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control geriatrico</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <form role="form">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Geriatrico') !!}
            <div class="form-group">
                {!! Form::label('geriatric_type', 'Tipo de valoracion geriatrica') !!}
                {!! Form::select('geriatric_type',
                ['Valoracion Medica' => 'Valoracion Medica',
                'Valoracion Funcional' => 'Valoracion Funcional',
                'Valoracion Cognitiva' => 'Valoracion Cognitiva',
                'Valoracion Social' => 'Valoracion Social'], ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notes', 'Anotaciones') !!}
                {!! Form::longtext('notes', null, ['class'=>'form-control', 'placeholder' => 'Detalle las observaciones y resultados de la valoracion geriatrica']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default">Cancelar</button>
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>
