<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Crear control de vacunacion</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <form role="form">
        <div class="box-body">
            {!! Form::hidden('control_type', 'Vacunacion') !!}
            <div class="form-group">
                {!! Form::label('vaccine', 'Vacuna') !!}
                {!! Form::text('vacuna', null, ['class'=>'form-control', 'placeholder'=>'Por ejemplo: DCG, Pentavalente, DPT, etc']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('via', 'Via de administracion') !!}
                {!! Form::select('via',
                    ['Intra-dermica' => 'Intra-dermica'
                    'Intra-muscular' => 'Intra-muscular',
                    'Oral' => 'Oral',
                    'Subcutanea' => 'Subcutanea'], ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('dosis', 'Numero de dosis') !!}
                {!! Form::number('dosis', '0', ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default">Cancelar</button>
            {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
        </div>
    </form>
</div>
