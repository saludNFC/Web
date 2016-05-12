<div class="panel panel-default">
    <div class="panel-heading">
        @can('create_consultation')
            <div class="col-md-offset-9">
                {!! Html::decode(link_to_route('paciente.consultas.create', '<i class="fa fa-plus"></i> Crear consulta médica', [$patient->id], ['class' => 'btn btn-primary'])) !!}
            </div>
        @endcan
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
                        <th>Encargado</th>
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
                        <td>{!! link_to_route('usuario.show', $consult->user->name, [$consult->user->id], []) !!}</td>
                        <td>
                            <div class="btn-group">
                                {!! Html::decode(link_to_route('paciente.consultas.show', '<i class="fa fa-eye"></i>', [$patient->id, $consult->id], ['class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ver Detalles'])) !!}

                                @can('update_consultation', $consult)
                                    {!! Html::decode(link_to_route('paciente.consultas.edit', '<i class="fa fa-pencil"></i>', [$patient->id, $consult->id], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Editar'])) !!}
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
