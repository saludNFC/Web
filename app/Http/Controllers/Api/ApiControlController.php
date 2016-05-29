<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ControlRequest;
use App\Http\Requests;
use App\Patient;
use App\Control;
use Api\Formatters\ControlTransformer;
use JWTAuth;
use Gate;

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
        // $this->middleware('auth.basic');
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
        //$user = JWTAuth::parseToken()->authenticate();
        // if(Gate::denies('create_control')){
		// 	return $this->respondForbidden('Usted no tiene permisos para editar este control.');
		// }

        $control = new Control($request->all());
        $control->patient_id = $patient->id;
        $control->user_id = 1;

        $control->save();
        //$user->controls()->save($control);

        return $this->respondCreated('Control creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Control $control){
        if($patient->id == $control->patient_id){
            return $this->respond([
                'data' => $this->controlTransformer->transform($control)
            ]);
        }
        else{
            return respondNotFound('El paciente que busca no tiene el control solicitado');
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
            if(Gate::allows('update_control', $control)){
                $control->update($request->all());
                return $this->respondEdited('control actualizado correctamente');
            }
            else{
                return $this->respondForbidden('Usted no puede actualizar la informacion de este control.');
            }
        }
        else{
            return respondNotFound('El paciente que busca no tiene el control solicitado');
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
            if(Gate::allows('delete_control', $control)){
                $control->delete();
                return $this->respondDeleted('Control borrado correctamente');
            }
            else{
                return $this->respondForbidden('Usted no puede borrar la informacion de este control.');
            }
        }
        else{
            return respondNotFound('El paciente que busca no tiene el control solicitado');
        }
    }
}
