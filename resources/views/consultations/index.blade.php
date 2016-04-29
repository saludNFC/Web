<div class="panel panel-default">
    <div class="panel-heading">
        <div class="col-md-offset-10">
            {!! link_to_route('paciente.consultas.create', 'Crear consulta médica', [$patient->id], ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    <div class="panel-body">
        @if( !$patient->consultation()->count())
            <div class="alert alert-warning">
                <h4>Alerta</h4>
                <p>El paciente {{ $patient->nombre }} {{ $patient->apellido }} no tiene registrados consultas médicas</p>
            </div>
        @else
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Anamnesis</th>
                        <th>Examen físico</th>
                        <th>Diagnostico</th>
                        <th>Tratamiento</th>
                        <th>Justificacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->consultation as $consult)
                    <tr>
                        <td>{{ $consult->id }}</td>
                        <td>{{ $consult->anamnesis }}</td>
                        <td>{{ $consult->physical_exam }}</td>
                        <td>{{ $consult->diagnosis }}</td>
                        <td>{{ $consult->treatment }}</td>
                        <td>{{ $consult->justification }}</td>
                        <td>
                            <div class="btn-group">
                                {!! link_to_route('paciente.consultas.show', 'Ver detalles', [$patient->id, $consult->id], ['class' => 'btn btn-default']) !!}
                                {!! link_to_route('paciente.consultas.edit', 'Editar', [$patient->id, $consult->id], ['class' => 'btn btn-primary']) !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
