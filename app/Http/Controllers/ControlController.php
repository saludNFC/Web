<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ControlRequest;
use App\Http\Requests;
use App\Patient;
use App\Control;
use Auth;
use Gate;

class ControlController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(Patient $patient)	{
		$controls = $patient->control()->get();
		return $controls;
	}

	public function show(Patient $patient, Control $control){
		return view('controls.show', compact('patient', 'control'));
	}

	public function create(Patient $patient){
		if(Gate::denies('create_control')){
			abort(403, 'Usted no está autorizado para crear controles del paciente');
		}

		return view('controls.create', compact('patient'));
	}

	public function store(Patient $patient, ControlRequest $request){
		$control = new Control($request->all());
		$control['patient_id'] = $patient->id;

		Auth::user()->controls()->save($control);
		return redirect()->route('paciente.show', $patient->historia)->with('message', 'Control creado');
	}


	public function edit(Patient $patient, Control $control){
		if(Gate::denies('update_control', $control)){
			abort(403, 'NO ESTA AUTORIZADO DE ESTAR AQUI!, JERK');
		}

		return view('controls.edit', compact('patient', 'control'));
	}

	public function update(Patient $patient, Control $control, ControlRequest $request){
		$control->update($request->all());
		$control['patient_id'] = $patient->id;
		// return $control;
        return redirect()->route('paciente.show', $patient->historia)->with('message', 'Control actualizado');
	}

	public function destroy(Patient $patient, Control $control){
		if(Gate::denies('delete_control', $control)){
			abort(403, 'NO ESTA AUTORIZADO DE ESTAR AQUI!, JERK');
		}

		$control->delete();
		return redirect()->route('paciente.index', $patient->historia)->with('message', 'Control eliminado');
	}
}
