<div class="container box box-solid">
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">NOMBRES:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $patient->nombre }} </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">APELLIDOS:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $patient->apellido }} </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">FECHA DE NACIMIENTO:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $patient->fecha_nac}} </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">LUGAR DE NACIMIENTO:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $patient->lugar_nac}} </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">GRUPO SANGUÍNEO:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $patient->grupo_sanguineo }} </p>
            </div>
        </div>
    </form>

    {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.destroy', $patient->id]]) !!}
    <div class="form-group btn-group" role="group">
        {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Borrar', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
        {!! link_to_route('paciente.edit', 'Editar', [$patient->id], ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
