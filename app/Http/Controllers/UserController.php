<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Gate;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        // return $users;
        return view('users.index', compact('users'));
    }

    public function show(User $user){
        return view('users.show', compact('user'));
    }

    public function create(){
        if(Gate::denies('create_user')){
            abort(403, 'Usted no esta autorizado para crear usuarios');
        }

        return view('users.create');
    }

    public function store(User $user, UserRequest $request){
        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = bcrypt($request->password);
        $new->pro_registration = $request->pro_registration;
        $new->save();
        $new->assignRole($request->rol);
        return redirect()->route('usuario.index')->with('message', 'Usuario creado');
    }

    public function edit(User $user){
        if(Gate::denies('update_user', $user)){
            abort(403, 'Usted no esta autorizado para editar los datos del usuario');
        }

        return view('users.edit', compact('user'));
    }

    public function update(User $user, UserRequest $request){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('usuario.index')->with('message', 'Usuario editado');
    }

    public function destroy(User $user){
        if(Gate::denies('update_user', $user)){
            abort(403, 'Usted no esta autorizado para borrar los datos del usuario');
        }

        $user->delete();
        return redirect()->route('usuario.index')->with('message', 'Usuario eliminado');
    }
}
