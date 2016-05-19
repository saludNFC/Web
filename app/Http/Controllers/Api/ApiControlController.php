<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ControlRequest;
use App\Http\Requests;
use App\Patient;
use App\Control;
use App\User;
use Api\Formatters\ControlTransformer;

class ApiControlController extends ApiController
{
    /**
     * @var Api\Formatters\ControlTransformer
     */
    protected $controlTransformer;

    /**
     * @param ControlTransformer $transformer
     */
    public function __construct(ControlTransformer $transformer){
        $this->controlTransformer = $transformer;
        $this->middleware('auth.basic');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient){
        $controls = $patient->control()->get();
        return $this->respond([
            'data' => $this->controlTransformer->transformCollection($controls->all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Patient $patient, ControlRequest $request){
        $control = new Control($request->all());
        $control->user_id = 1; // HARDCODED
        $patient->control()->save($control);

        return $this->respondCreated('Antecedente creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Control $control){
        if($patient->id == $control->patient_id){
            return $this->controlTransformer->transform($control);
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
    public function update(Patient $patient, Control $control, ControlRequest $request){
        if($patient->id == $control->patient_id){
            $control->update($request->all());
            return $this->respondEdited('Antecedente actualizado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, Control $control){
        if($patient->id == $control->patient_id){
            $control->delete();
            return $this->respondDeleted('Antecedente borrado correctamente');
        }
    }
}
