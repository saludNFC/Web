<div class="btn-group">
    {!! Html::decode( link_to_route('paciente.antecedentes.show', '<i class="fa fa-eye"></i>', [$patient->id, $history->id], ['class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ver Detalles'] )) !!}
    @can('update_history', $history)
        {!! Html::decode(link_to_route('paciente.antecedentes.edit', '<i class="fa fa-pencil"></i>', [$patient->id, $history->id], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Editar'])) !!}
    @endcan
</div>
