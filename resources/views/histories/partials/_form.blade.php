<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Antecedentes familiares</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Antecedentes personales</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Antecedentes de medicamentos</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            @include('histories.partials._familiar')
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            @include('histories.partials._personal')
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            @include('histories.partials._medicine')
        </div>
    <!-- /.tab-pane -->
    </div>
<!-- /.tab-content -->
</div>
        <!-- /.box-body -->

            <div class="box-footer">
                <button class="btn btn-default">Cancelar</button>
                {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
            </div>

@include('errors.patientform')
