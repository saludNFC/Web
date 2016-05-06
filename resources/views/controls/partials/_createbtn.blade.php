<div class="col-md-offset-10">
    {!! Html::decode(link_to_route('paciente.controles.create', '<i class="fa fa-plus"></i> Crear control', [$patient->id], ['class' => 'btn btn-primary'])) !!}
</div>
