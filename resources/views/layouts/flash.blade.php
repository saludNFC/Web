<div class="modal fade bs-modal-sm modal-primary" id="flash">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Exito!</h4>
            </div>
            <div class="modal-body">
                <p>{{ Session::get('message') }}</p>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
