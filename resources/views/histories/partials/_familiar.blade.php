<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear antecedente familiar</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <form role="form">
        <div class="box-body">
            {!! Form::hidden('history_type', 'familiar') !!}
            <div class="form-group">
                {!! Form::label('grade', 'Relación de parentesco') !!}
                {!! Form::text('grade', null, ['class'=>'form-control', 'placeholder'=>'Abuelo, padre, madre, etc']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('illness', 'Antecedente médico') !!}
                {!! Form::text('illness', null, ['class'=>'form-control', 'placeholder'=>'Antecedente medico del familiar']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default">Cancelar</button>
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>
