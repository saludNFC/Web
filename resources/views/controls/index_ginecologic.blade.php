<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_control')
            @include('controls.partials._createbtn')
        @endcan
    </div>
    <div class="panel-body">
        @if( !$patient->control->where('control_type', 'Ginecologico')->count() )
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados controles ginecologicos</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de control</th>
                        <th>Fecha ultima menstruacion</th>
                        <th>Fecha ultima mamografía</th>
                        <th>Fecha ultimo papanicolau</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->control->where('control_type', 'Ginecologico') as $control)
                    <tr>
                        <td>{{ $control->id }}</td>
                        <td>{{ $control->control_type }}</td>
                        <td>{{ $control->last_menst->format('d-m-Y') }}</td>
                        <td>
                            @if($control->last_mamo != null)
                                {{ $control->last_mamo->format('d-m-Y') }}
                            @endif
                        </td>
                        <td>
                            @if($control->last_papa != null)
                                {{ $control->last_papa->format('d-m-Y') }}
                            @endif
                        </td>
                        <td>{{ $control->user->name }}</td>
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
