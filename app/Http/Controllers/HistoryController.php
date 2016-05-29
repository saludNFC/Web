<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;
use App\Http\Requests;
use App\Patient;
use App\History;
use Auth;
use Gate;

class HistoryController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(Patient $patient)	{
		$histories = $patient->history()->get();
		return $histories;
		// return view('histories.index', compact('histories'));
	}

	public function show(Patient $patient, History $history){
		dd($history);
		// return view('histories.show', compact('patient', 'history'));
	}

	public function create(Patient $patient){
		if(Gate::denies('create_history')){
			abort(403, 'Usted no esta autorizado para crear antecedentes del paciente');
		}

		return view('histories.create', compact('patient'));
	}

	public function store(Patient $patient, HistoryRequest $request){
		$historia = new History($request->all());
		$historia['patient_id'] = $patient->id;

		Auth::user()->histories()->save($historia);
		return redirect()->route('paciente.show', $patient->historia)->with('message', 'Antecedente creado correctamente');
	}


	public function edit(Patient $patient, History $history){
		if(Gate::denies('update_history', $history)){
			abort(403, 'No esta autorizado para editar este antecedente del paciente');
		}

		return view('histories.edit', compact('patient', 'history'));
	}

	public function update(Patient $patient, History $history, HistoryRequest $request){
		$history->update($request->all());
		$history['patient_id'] = $patient->id;
        return redirect()->route('paciente.show', $patient->historia)->with('message', 'Antecedente actualizado');
	}

	public function destroy(Patient $patient, History $history){
		if(Gate::denies('delete_history', $history)){
			abort(403, 'No esta autorizado para borrar este antecedente del paciente');
		}

		$history->delete();
		return redirect()->route('paciente.show', $patient->id)->with('message', 'Antecedente eliminado');
	}
}
