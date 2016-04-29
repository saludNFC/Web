<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control de crecimiento y desarrollo</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <form role="form">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Crecimiento') !!}
            <div class="form-group">
                {!! Form::label('weight', 'Peso') !!}
                {!! Form::number('weight', null, ['class'=>'form-control', 'placeholder'=>'Peso del paciente en Kg', 'step' => 'any']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('height', 'Altura') !!}
                {!! Form::number('height', null, ['class'=>'form-control', 'placeholder' => 'Altura del paciente en cm', 'step' => 'any']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default">Cancelar</button>
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>

@include('errors.form_errors')
