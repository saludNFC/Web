<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;
use App\Http\Requests;
use App\Patient;
use App\History;
use App\User;
use Auth;
use Gate;
use Api\Formatters\HistoryTransformer;

class ApiHistoryController extends ApiController
{
    /**
     * @var Api\Formatters\HistoryTransformer
     */
    protected $historyTransformer;

    /**
     * @param PatientTransformer $transformer [description]
     */
    public function __construct(HistoryTransformer $transformer){
        $this->historyTransformer = $transformer;
        $this->middleware('auth.basic');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient){
        $histories = $patient->history()->get();
        return $this->respond([
            'data' => $this->historyTransformer->transformCollection($histories->all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Patient $patient, HistoryRequest $request){
        $history = new History($request->all());
        $history->user_id = 1; // HARDCODED
        $patient->history()->save($history);

        return $this->respondCreated('Antecedente creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, History $history){
        if($patient->id == $history->patient_id){
            return $this->historyTransformer->transform($history);
        }
        else{
            return respondNotFound('El paciente que busca no tiene el antecedente solicitado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient, History $history, HistoryRequest $request){
        if($patient->id == $history->patient_id){
            $history->update($request->all());
            return $this->respondEdited('Antecedente actualizado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, History $history){
        if($patient->id == $history->patient_id){
            $history->delete();
            return $this->respondDeleted('Antecedente borrado correctamente');
        }
    }
}
