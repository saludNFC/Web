<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_history')
            @include('histories.partials._createbtn')
        @endcan
    </div>
    <div class="panel-body">
        @if( !$patient->history->where('history_type', 'Personal')->count() )
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados antecedentes personales</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de antecedente</th>
                        <th></th>
                        <th class="overflow">Descripcion</th>
                        <th class="overflow">Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->history()->where('history_type', 'Personal')->orderBy('created_at', 'desc')->get() as $history)
                    <tr>
                        <td>{{ $history->created_at }}</td>
                        <td>{{ $history->history_type }}</td>
                        <td>{{ $history->type_personal }}</td>
                        <td class="overflow">{{ $history->description }}</td>
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
