<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col-md-offset-10">
            {!! link_to_route('paciente.antecedentes.create', 'Crear antecedente', [$patient->id], ['class' => 'btn btn-primary']) !!}
        </div>
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
                        <th>ID</th>
                        <th>Tipo de antecedente</th>
                        <th></th>
                        <th class="overflow">Descripcion</th>
                        <th class="overflow">Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->history->where('history_type', 'Personal') as $history)
                    <tr>
                        <td>{{ $history->id }}</td>
                        <td>{{ $history->history_type }}</td>
                        <td>{{ $history->type_personal }}</td>
                        <td class="overflow">{{ $history->description }}</td>
                        <td>{{ $history->user->name }}</td>
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
