<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ConsultationRequest;
use App\Http\Requests;
use App\Patient;
use App\Consultation;
use App\User;
use Api\Formatters\ConsultationTransformer;

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
        $this->middleware('auth.basic');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient){
        $consultations = $patient->consultation()->get();
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
        $consultation = new Consultation($request->all());
        $consultation->user_id = 1; // HARDCODED
        $patient->consultation()->save($consultation);

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
            return $this->consultationTransformer->transform($consultation);
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
        if($patient->id == $consultation->patient_id){
            $consultation->update($request->all());
            return $this->respondEdited('Consulta médica actualizada correctamente');
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
            $consultation->delete();
            return $this->respondDeleted('Consulta médica borrada correctamente');
        }
    }
}
