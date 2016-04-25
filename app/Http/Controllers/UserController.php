<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        // return $users;
        return view('users.index', compact('users'));
    }

    public function show(User $user){
        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(User $user, Request $request){
        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = bcrypt($request->password);
        $new->save();
        return redirect()->route('usuario.index')->with('message', 'Usuario creado');
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('usuario.index')->with('message', 'Usuario editado');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('usuario.index')->with('message', 'Usuario eliminado');
    }
}
