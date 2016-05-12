<div class="col-md-10">
    <!-- Horizontal Form -->
    <div class="box box-default">
        <form></form>
        <div class="form-horizontal">
            <div class="box-body">

                <!-- ROL -->
                <div class="form-group">
                    {!! Form::label('rol', 'Tipo de usuario', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('rol',
                        ['admin' => "Administrador",
                        'doctor' => 'Doctor',
                        'nurse' => 'Enfermera'], null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <!-- NOMBRE COMPLETO -->
                <div class="form-group{{ $errors->any() ? ($errors->has('name') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('name', 'Nombre completo', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Juan Perez']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- MATRICULA PROFESIONAL -->
                <div class="form-group{{ $errors->any() ? ($errors->has('pro_registration') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('pro_registration', 'Matricula profesional', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('pro_registration', null, ['class'=>'form-control']) !!}
                        @if ($errors->has('pro_registration'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pro_registration') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <!-- CORREO ELECTRONICO -->
                <div class="form-group{{ $errors->any() ? ($errors->has('email') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('email', 'Correo electronico', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'juan@ejemplo.com']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="form-group{{ $errors->any() ? ($errors->has('password') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('password', 'Password', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password', null, ['class'=>'form-control']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="form-group{{ $errors->any() ? ($errors->has('password_confirmation') ? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('password', 'Confirme el password', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::password('password', null, ['class'=>'form-control', 'name' => 'password_confirmation']) !!}
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! link_to_route('usuario.index', 'Cancelar', [], ['class' => 'btn btn-default']) !!}
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

@include('errors.form_errors')
