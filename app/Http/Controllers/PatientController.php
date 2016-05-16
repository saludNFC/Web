<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Requests;
use App\Patient;
use Auth;
use Gate;
use App\User;

class PatientController extends Controller
{
    public function __construct(){
        // Uses the middleware with alias auth to redirect to the login page for every request, except the show
        $this->middleware('auth', ['except' => 'show']);
    }

    public function index(){
        $patients = Patient::all();
        // return $patients->with($HTTP->Status);
        return view('patients.index', compact('patients'));
    }

    public function show(Patient $patient){
        // dd($patient);
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient){
        if(Gate::denies('update_patient', $patient)){
            abort(403, 'Usted no esta autorizado para editar los datos de pacientes');
        }
        return view('patients.edit', compact('patient'));
    }

    public function update(Patient $patient, PatientRequest $request){
        $patient->update($request->all());
        return redirect()->route('paciente.index')->with('message', 'Los datos del paciente fueron actualizados correctamente');
    }

    public function create(){
        if(Gate::denies('create_patient')){
            abort(403, 'Usted no esta autorizado para crear pacientes');
        }
        // $patient = new Patient();
        return view('patients.create');
    }

    public function store(PatientRequest $request){
        $patient = new Patient($request->all());
        $patient->historia = $patient->codHistoria($patient);
        Auth::user()->patients()->save($patient);

        // Get the last patient saved and pass his id to be able to create his histories
        $last = Patient::get()->last();
        session()->flash('message', 'Los datos generales del paciente fueron guardados correctamente.');
        return redirect()->route('paciente.antecedentes.create', [$last->id]);
    }

    public function destroy(Patient $patient){
        if(Gate::denies('delete', $patient)){
            abort(403, 'Usted no esta autorizado para borrar pacientes');
        }

        $patient->delete();
        return redirect()->route('paciente.index')->with('message', 'Paciente eliminado');
    }
}
