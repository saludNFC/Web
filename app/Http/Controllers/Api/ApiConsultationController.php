<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ConsultationRequest;
use App\Http\Requests;
use App\Patient;
use App\Consultation;
use Api\Formatters\ConsultationTransformer;
use JWTAuth;
use DB;
use Gate;

class ApiConsultationController extends ApiController
{
    /**
     * @var Api\Formatters\ConsultationTransformer
     */
    protected $consultationTransformer;

    /**
     * @param ConsultationTransformer $transformer
     */
    public function __construct(ConsultationTransformer $transformer){
        $this->consultationTransformer = $transformer;
        $this->middleware('jwt.auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient){
        if(! JWTAuth::getToken() || JWTAuth::isBlackListed(JWTAuth::getPayload(JWTAuth::getToken()))){
            // dd("guest");
            $consultations = $patient->consultation()->where('flag', true)->orderBy('created_at', 'desc')->get();
        }
        else{
            $consultations = $patient->consultation()->orderBy('created_at', 'desc')->get();
        }
        return $this->respond([
            'data' => $this->consultationTransformer->transformCollection($consultations->all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Patient $patient, ConsultationRequest $request){
        $user = JWTAuth::parseToken()->authenticate();
        if(Gate::denies('create_consultation')){
            return $this->respondForbidden('Usted no tiene permisos para crear consultas medicas');
        }
        $consultation = new Consultation($request->all());
        $consultation->patient_id = $patient->id;
        // $consultation->user_id = 1;
        // $consultation->save();
        $user->consultations()->save($consultation);

        return $this->respondCreated('Consulta médica creada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Consultation $consultation){
        if($patient->id == $consultation->patient_id){
            return $this->respond([
                'data' => $this->consultationTransformer->transform($consultation)
            ]);
        }
        else{
            return respondNotFound('El paciente que busca no tiene la consulta médica solicitada');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient, Consultation $consultation, ConsultationRequest $request){
        // $user = JWTAuth::parseToken()->authenticate();
         if($patient->id == $consultation->patient_id){
        //     if(Gate::denies('update_consultation', $consultation)){
        //         return $this->respondForbidden('Usted no tiene permisos de actualizar la informacion de esta consulta medica');
        //     }
        //     else{
                $consultation->update($request->all());
                return $this->respondEdited('Consulta médica actualizada correctamente');
            // }
        }
        else{
            return $this->respondNotFound('El paciente que busca no tiene la consulta médica solicitada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, Consultation $consultation){
        if($patient->id == $consultation->patient_id){
            if(Gate::allows('delete_consultation', $consultation)){
                $consultation->delete();
                return $this->respondDeleted('Consulta médica borrada correctamente');
            }
            else{
                return $this->respondForbidden('Sin permisos');
            }
        }
        else{
            return $this->respondNotFound('El paciente que busca no tiene la consulta médica solicitada');
        }
    }
}
