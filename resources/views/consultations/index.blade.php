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
                        <th class="overflow">Anamnesis</th>
                        <th class="overflow">Examen físico</th>
                        <th class="overflow">Diagnostico</th>
                        <th class="overflow">Tratamiento</th>
                        <th class="overflow">Justificacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->consultation as $consult)
                    <tr>
                        <td class="overflow">{{ $consult->id }}</td>
                        <td class="overflow">{{ $consult->anamnesis }}</td>
                        <td class="overflow">{{ $consult->physical_exam }}</td>
                        <td class="overflow">{{ $consult->diagnosis }}</td>
                        <td class="overflow">{{ $consult->treatment }}</td>
                        <td class="overflow">{{ $consult->justification }}</td>
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
