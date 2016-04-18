<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Patient;
use App\Consultation;

class ConsultationController extends Controller
{
	public function index(Patient $patient)	{
		$consultations = $patient->consultation()->get();
		return $consultations;
	}

	public function show(Patient $patient, Consultation $consultation){
		return view('consultations.show', compact('patient', 'consultation'));
	}

	public function create(Patient $patient){
		return view('consultations.create', compact('patient'));
	}

	public function store(Patient $patient, Request $request){
		$consultation = $request->all();
		$consultation['patient_id'] = $patient->id;
		Consultation::create($consultation);

		return redirect()->route('paciente.show', $patient->id)->with('message', 'Consutla medica creada');
	}


	public function edit(Patient $patient, Consultation $consultation){
		return view('consultations.edit', compact('patient', 'consultation'));
	}

	public function update(Patient $patient, Consultation $consultation, Request $request){
		$consultation->update($request->all());
		$consultation['patient_id'] = $patient->id;
        return redirect()->route('paciente.show', $patient->id)->with('message', 'Consulta medica actualizada');
	}

	public function destroy(Patient $patient, History $history){
		//
	}
}
