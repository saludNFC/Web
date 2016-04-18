<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Requests;
use App\Patient;

class PatientController extends Controller
{
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
        Patient::create($request->all());
        return redirect()->route('paciente.index')->with('message', 'Paciente creado');
    }

    public function destroy(Patient $patient){
        // dd($patient);
        $patient->delete();
        return redirect()->route('paciente.index')->with('message', 'Paciente eliminado');
    }
}
