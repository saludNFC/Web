<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col-md-offset-10">
            <!-- <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Crear antecedente <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>{!! link_to_route('paciente.antecedentes.create', 'Antecedente familiar', [$patient->id]) !!}</li>
                    <li><a href="#">Antecedente personal</a></li>
                    <li><a href="#">Medicamentos</a></li>
                </ul>
            </div> -->
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
