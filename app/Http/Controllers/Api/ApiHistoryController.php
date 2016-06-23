<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Api\Formatters\HistoryTransformer;
use App\Http\Requests\HistoryRequest;
use App\Http\Requests;
use App\Patient;
use App\History;
use JWTAuth;
use Auth;
use Gate;

class ApiHistoryController extends ApiController
{
    /**
     * @var Api\Formatters\HistoryTransformer
     */
    protected $historyTransformer;

    /**
     * @param PatientTransformer $transformer
     */
    public function __construct(HistoryTransformer $transformer){
        $this->historyTransformer = $transformer;
        // $this->middleware('jwt.auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient){
        // $token = JWTAuth::getToken();
        // dd($token);

        // if(! JWTAuth::getToken()){
        //     // dd("guest");
        //     $histories = $patient->history()->where('flag', true)->orderBy('created_at', 'desc')->get();
        // }
        // else{
            // dd("user");
            $histories = $patient->history()->orderBy('created_at', 'desc')->get();
        // }
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
        $user = JWTAuth::parseToken()->authenticate();
        if(Gate::denies('create_history')){
			return $this->respondForbidden('Usted no tiene permisos para crear antecedentes.');
		}

        $history = new History($request->all());
        $history->patient_id = $patient->id;
        // $history->user_id = 1;
        // $history->save();
        $user->histories()->save($history);
        // $patient->history()->save($history);

        return $this->respondCreated('Antecedente creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, History $history){
        if ($patient->id == $history->patient_id){
            return $this->respond([
                'data' => $this->historyTransformer->transform($history)
            ]);
        }
        else{
            return $this->respondNotFound('El paciente que busca no tiene el antecedente solicitado');
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
        $user = JWTAuth::parseToken()->authenticate();
        if($patient->id == $history->patient_id){
            if(Gate::allows('update_history', $history)){
                $history->update($request->all());
                return $this->respondEdited('Antecedente actualizado correctamente');
            }
            else{
                return respondForbidden('Usted no tiene permisos para actualizar la informacion de este antecedente');
            }
        }
        else{
            return $this->respondNotFound('El paciente que busca no tiene el antecedente solicitado');
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
            if(Gate::allows('delete_history', $history)){
                $history->delete();
                return $this->respondDeleted('Antecedente borrado correctamente');
            }
            else{
                return $this->respondForbidden('Usted no tiene permisos para borrar este antecedente');
            }
        }
        else{
            return $this->respondNotFound('El paciente que busca no tiene el antecedente solicitado');
        }
    }
}
