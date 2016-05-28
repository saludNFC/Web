<div class="btn-group">
    {!! Html::decode(link_to_route('paciente.controles.show', '<i class="fa fa-eye"></i>', [$patient->historia, $control->id], ['class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ver Detalles'])) !!}
    @can('update_control', $control)
        {!! Html::decode(link_to_route('paciente.controles.edit', '<i class="fa fa-pencil"></i>', [$patient->historia, $control->id], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Editar'])) !!}
    @endcan
</div>
