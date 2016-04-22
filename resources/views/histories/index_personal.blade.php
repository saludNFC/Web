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
                    <th></th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patient->history->where('history_type', 'Personal') as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->history_type }}</td>
                    <td>{{ $history->type_personal }}</td>
                    <td>{{ $history->description }}</td>
                    <td>
                        <div class="btn-group">
                            {!! link_to_route('paciente.antecedentes.show', 'Ver detalles', [$patient->id, $history->id], ['class' => 'btn btn-default']) !!}
                            {!! link_to_route('paciente.antecedentes.edit', 'Editar', [$patient->id, $history->id], ['class' => 'btn btn-primary']) !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
