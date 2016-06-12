<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_history')
            @include('histories.partials._createbtn')
        @endcan
    </div>
    <div class="panel-body">
        @if( !$patient->history->where('history_type', 'Familiar' )->count())
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados antecedentes familiares</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de antecedente</th>
                        <th>Grado</th>
                        <th class="overflow">Enfermedad</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->history()->where('history_type', 'Familiar')->orderBy('created_at', 'desc')->get() as $history)
                    <tr>
                        <td>{{ $history->created_at }}</td>
                        <td>{{ $history->history_type }}</td>
                        <td>{{ $history->grade }}</td>
                        <td class="overflow">{{ $history->illness }}</td>
                        <td>{!! link_to_route('usuario.show', $history->user->name, [$history->user->id], []) !!}</td>
                        <td>
                            <div class="btn-group">
                                @include('histories.partials._actions')
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
