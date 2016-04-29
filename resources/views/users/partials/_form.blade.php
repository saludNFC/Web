<div class="col-md-10">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">

                <!-- Cedula de identidad!!! -->
                <div class="form-group">
                    {!! Form::label('name', 'Nombre completo', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Juan Perez']) !!}
                    </div>
                </div>

                <!-- NOMBRES!!! -->
                <div class="form-group">
                    {!! Form::label('email', 'Correo electronico', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'juan@ejemplo.com']) !!}
                    </div>
                </div>

                <!-- APELLIDOS!!! -->
                <div class="form-group">
                    {!! Form::label('password', 'Password', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! link_to_route('usuario.index', 'Cancelar', [], ['class' => 'btn btn-default']) !!}
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </form>
    </div>
</div>

@include('errors.form_errors')
