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
        return redirect()->route('paciente.index')->with('message', 'Los datos del paciente fueron actualizados correctamente');
    }

    public function create(){
        return view('patients.create');
    }

    public function store(PatientRequest $request){
        Auth::user()->patients()->create($request->all());

        // Get the last patient saved and pass his id to be able to create his histories
        $last = Patient::get()->last();
        session()->flash('message', 'Los datos generales del paciente fueron guardados correctamente.');
        return redirect()->route('paciente.antecedentes.create', [$last->id]);
    }

    public function destroy(Patient $patient){
        // dd($patient);
        $patient->delete();
        return redirect()->route('paciente.index')->with('message', 'Paciente eliminado');
    }
}
