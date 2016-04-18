<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Patient;
use App\Control;

class ControlController extends Controller
{
	public function index(Patient $patient)	{
		$controls = $patient->control()->get();
		return $controls;
	}

	public function show(Patient $patient, Control $control){
		return view('controls.show', compact('patient', 'control'));
	}

	public function create(Patient $patient){
		return view('controls.create', compact('patient'));
	}

	public function store(Patient $patient, Request $request){
		$control = $request->all();
		$control['patient_id'] = $patient->id;
		Control::create($control);
		// return $historia['history_type'];
		return redirect()->route('paciente.show', $patient->id)->with('message', 'Control creado');
	}


	public function edit(Patient $patient, Control $control){
		return view('controls.edit', compact('patient', 'control'));
	}

	public function update(Patient $patient, Control $control, Request $request){
		$control->update($request->all());
		$control['patient_id'] = $patient->id;
        return redirect()->route('paciente.show', $patient->id)->with('message', 'Control actualizado');
	}

	public function destroy(Patient $patient, Control $control){
		$control->delete();
		return redirect()->route('paciente.index', $patient->id)->with('message', 'Control eliminado');
	}
}
