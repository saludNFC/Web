<div class="col-md-10 col-md-offset-1">
    <div class="form-horizontal"></div>
    <!-- Horizontal Form -->
    <div class="box box-default">
        <!-- /.box-header -->
        <form></form>

        <div class="form-horizontal">
            <div class="box-body">

                <div class="form-group{{ $errors->any() ? ($errors->has('name')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('name', 'Nombres: ', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombres del contacto']) !!}
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->any() ? ($errors->has('lastname')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('lastname', 'Apellidos: ', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Apellidos del contacto']) !!}
                        @if($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->any() ? ($errors->has('relationship')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('relationship', 'Relación de parentesco: ', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('relationship', null, ['class'=>'form-control', 'placeholder'=>'Relación de parentesco con el paciente']) !!}
                        @if($errors->has('relationship'))
                            <span class="help-block">
                                <strong>{{ $errors->first('relationship') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->any() ? ($errors->has('phone')? ' has-error' : ' has-success') : '' }}">
                    {!! Form::label('phone', 'Teléfono de contacto: ', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                        @if($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! link_to_route('paciente.show', 'Cancelar', [$patient->historia], ['class' => 'btn btn-default']) !!}
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

@include('errors.form_errors')
