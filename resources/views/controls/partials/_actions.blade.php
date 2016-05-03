<div class="btn-group">
    {!! link_to_route('paciente.controles.show', 'Ver detalles', [$patient->id, $control->id], ['class' => 'btn btn-default']) !!}
    @can('update_control', $control)
        {!! link_to_route('paciente.controles.edit', 'Editar', [$patient->id, $control->id], ['class' => 'btn btn-primary']) !!}
    @endcan
</div>
