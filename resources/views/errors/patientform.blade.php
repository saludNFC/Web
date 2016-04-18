<!-- LISTA DE ERRORES -->
@if($errors->any())
    <div class="col-md-10">
        <ul class="col-md-10 alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
