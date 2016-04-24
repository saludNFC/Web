<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col-md-offset-10">
            {!! link_to_route('paciente.controles.create', 'Crear control', [$patient->id], ['class' => 'btn btn-primary']) !!}
        </div>
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
                        <th>ID</th>
                        <th>Tipo de control</th>
                        <th>Temperatura</th>
                        <th>Frecuencia cardíaca</th>
                        <th>Presion arterial</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->control->where('control_type', 'Triaje') as $control)
                    <tr>
                        <td>{{ $control->id }}</td>
                        <td>{{ $control->control_type }}</td>
                        <td>{{ $control->temperature }}</td>
                        <td>{{ $control->heart_rate }}</td>
                        <td>{{ $control->sistole }} / {{ $control->diastole }}</td>
                        <td>
                            <div class="btn-group">
                                {!! link_to_route('paciente.controles.show', 'Ver detalles', [$patient->id, $control->id], ['class' => 'btn btn-default']) !!}
                                {!! link_to_route('paciente.controles.edit', 'Editar', [$patient->id, $control->id], ['class' => 'btn btn-primary']) !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
