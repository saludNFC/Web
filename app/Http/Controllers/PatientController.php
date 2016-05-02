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
        $patient = new Patient($request->all());
        if(str_contains($patient->apellido, ' ')){
            $words = explode(" ", $patient->apellido);
            $output = substr($words[0], 0, 1) . substr($words[1], 0, 1);
            $hc_cod = strtoupper($output);
        }
        else{
            $hc_cod = strtoupper(substr($patient->apellido, 0, 1));
        }

        $hc_cod .=  strtoupper(substr($patient->nombre, 0, 1)) . '-';
        if($patient->fecha_nac->day < 10){
            $hc_cod .= '0';
        }

        $hc_cod .= $patient->fecha_nac->day;
        if($patient->fecha_nac->month < 10){
            $hc_cod .= '0';
        }
        $hc_cod .= $patient->fecha_nac->month . $patient->fecha_nac->year;

        $patient->historia = $hc_cod;
        Auth::user()->patients()->save($patient);

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
