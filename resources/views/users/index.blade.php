@extends('app')

@section('title')
    <h1>
        Lista de usuarios
    </h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            @can('create_user')
                <div class="col-md-offset-10">
                    {!! link_to_route('usuario.create', 'Crear usuario', [], ['class' => 'btn btn-primary']) !!}
                </div>
            @endcan
        </div>
        <div class="panel-body">
    @if( !$users->count() )
            <p class="alert alert-danger">No hay usuarios registrados</p>
        </div>
    </div>
    @else
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electronico</th>
                    <th>Rol de usuario</th>
                    <th>Matricula Profesional</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @foreach($user->roles as $role)
                            <td>{{ $role->label }}</td>
                        @endforeach
                        <td>{{ $user->pro_registration }}</td>
                        <td>
                            @can('update_user', $user)
                                <div class="btn-group">
                                    {!! link_to_route('usuario.show', 'Ver Detalles', [$user->id], ['class' => 'btn btn-default']) !!}
                                    {!! link_to_route('usuario.edit', 'Editar', [$user->id], ['class' => 'btn btn-primary']) !!}
                                </div>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    @endif
@stop
