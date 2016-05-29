<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_history')
            @include('histories.partials._createbtn')
        @endcan
    </div>
    <div class="panel-body">
        @if( !$patient->history->where('history_type', 'Medicamentos')->count() )
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados antecedentes de medicamentos</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de antecedente</th>
                        <th>Medicamento</th>
                        <th>Vía de administración</th>
                        <th>Fecha de primera administración</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->history->where('history_type', 'Medicamentos') as $history)
                    <tr>
                        <td>{{ $history->id }}</td>
                        <td>{{ $history->history_type }}</td>
                        <td>{{ $history->med }}</td>
                        <td>{{ $history->via }}</td>
                        <td>{{ $history->date_ini }}</td>
                        <td>{!! link_to_route('usuario.show', $history->user->name, [$history->user->id], []) !!}</td>
                        <td>
                            @include('histories.partials._actions')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
