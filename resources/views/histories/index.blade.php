<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col-md-offset-10">
            {!! link_to_route('paciente.antecedentes.create', 'Crear antecedente', [$patient->id], ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de antecedente</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patient->history as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->history_type }}</td>
                    <td>{{ $history->story }}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.antecedentes.destroy', $patient->id, $history->id ]]) !!}
                            <div class="form-group btn-group" role="group">
                                {!! link_to_route('paciente.antecedentes.show', 'Ver detalles', [$patient->id, $history->id], ['class' => 'btn btn-default']) !!}
                                {!! link_to_route('paciente.antecedentes.edit', 'Editar', [$patient->id, $history->id], ['class' => 'btn btn-primary']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-fw"></i>&nbsp;Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                            </div>
                        {!! Form::close() !!}
                        <div class="btn-group">

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
