<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_control')
            @include('controls.partials._createbtn')
        @endcan
    </div>
    <div class="panel-body">
        @if( !$patient->control->where('control_type', 'Crecimiento')->count() )
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados controles de crecimiento y desarrollo</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de control</th>
                        <th>Peso (Kg)</th>
                        <th>Altura (cm)</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->control()->where('control_type', 'Crecimiento')->orderBy('created_at', 'desc')->get() as $control)
                    <tr>
                        <td>{{ $control->created_at }}</td>
                        <td>{{ $control->control_type }}</td>
                        <td>{{ $control->weight }}</td>
                        <td>{{ $control->height }}</td>
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
