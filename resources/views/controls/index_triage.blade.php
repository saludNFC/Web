<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_control')
            @include('controls.partials._createbtn')
        @endcan
    </div>
    <div class="panel-body">
        @if( !$patient->control->where('control_type', 'Triaje')->count() )
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados controles de triaje</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de control</th>
                        <th>Temperatura</th>
                        <th>Frecuencia cardíaca</th>
                        <th>Presion arterial</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->control()->where('control_type', 'Triaje')->orderBy('created_at', 'desc')->get() as $control)
                    <tr>
                        <td>{{ $control->created_at }}</td>
                        <td>{{ $control->control_type }}</td>
                        <td>{{ $control->temperature }}</td>
                        <td>{{ $control->heart_rate }}</td>
                        <td>{{ $control->sistole }} / {{ $control->diastole }}</td>
                        <td>{!! link_to_route('usuario.show', $control->user->name, [$control->user->id], []) !!}</td>
                        <td>
                            @include('controls.partials._actions', $control)
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
