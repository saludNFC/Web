<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request as Req;
use App\Http\Requests\PatientRequest;
use App\Http\Requests;
use App\Patient;
use Auth;
use Gate;
use App\User;
use Api\Formatters\PatientTransformer;

class ApiPatientController extends Controller
{
    protected $patientTransformer;

    public function __construct(PatientTransformer $transformer){
        $this->patientTransformer = $transformer;
    }

    public function index(){
        $patients = Patient::all();
        return response()->json([
            'data' => $this->patientTransformer->transformCollection($patients->all())
        ]);
    }

    public function show($id){
        $patient = Patient::find($id);
        if( ! $patient){
            return response()->json([
                'error' => [
                    'mensaje' => 'Paciente no encontrado'
                ]
            ]);
        }

        return response()->json([
            'data' => $this->patientTransformer->transform($patient)
        ]);
    }

    public function update($id, PatientRequest $request){
        $patient->update($request->all());
        return redirect()->route('paciente.index')->with('message', 'Los datos del paciente fueron actualizados correctamente');
    }

    /**
        * Display a listing of the resource.
        *
        * @param  Illuminate\Http\Request $request
        * @return Response
    */
    public function store(PatientRequest $request){
        // $patient = new Patient($this->request->all());
        // $patient->historia = $patient->codHistoria($patient);
        // $patient->user_id = 1;
        // dd($patient);

        // if($this->failedValidation($patient)){
        //     return response()->json([
        //         'error' => 'ERROR'
        //     ], 400);
        // }

        // $patient->save();
        // return response()->json([
        //     'success' => [
        //         'mensaje' => 'Datos guardados correctamente'
        //     ]
        // ]);
    }

    public function destroy(Patient $patient){
        if(Gate::denies('delete', $patient)){
            abort(403, 'Usted no esta autorizado para borrar pacientes');
        }

        $patient->delete();
        return redirect()->route('paciente.index')->with('message', 'Paciente eliminado');
    }
}
