<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Requests;
use App\Patient;
use Auth;
use App\User;

class PatientController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('manager');
    }

    public function index(){
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function show(Patient $patient){
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient){
        return view('patients.edit', compact('patient'));
    }

    public function update(Patient $patient, PatientRequest $request){
        $patient->update($request->all());
        return redirect()->route('paciente.index')->with('message', 'Paciente actualizado');
    }

    public function create(){
        return view('patients.create');
    }

    public function store(PatientRequest $request){
        $patient = new Patient($request->all());
        Auth::user()->patients()->save($patient);

        // $user = User::where('id', 1)->get();
        // $user->patients()->save($patient);
        $last = Patient::get()->last();
        return redirect()->route('paciente.antecedentes.create', [$last->id])
            ->with('message', 'Paciente creado');
    }

    public function destroy(Patient $patient){
        // dd($patient);
        $patient->delete();
        return redirect()->route('paciente.index')->with('message', 'Paciente eliminado');
    }
}
