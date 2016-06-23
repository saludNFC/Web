<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Requests;
use App\Patient;
use Api\Formatters\PatientTransformer;
use JWTAuth;
use Auth;
use Gate;

class ApiPatientController extends ApiController{

    /**
     * @var Api\Formatters\PatientTransformer
    */
    protected $patientTransformer;
    protected $apiAuthController;

    public function __construct(PatientTransformer $transformer){
        $this->patientTransformer = $transformer;
        // $this->middleware('jwt.auth', ['except' => 'show']);
    }

    /**
     * Displays a list of all patients
     * @return Json response
     */
    public function index(){
        $patients = Patient::all();
        return $this->respond([
            'data' => $this->patientTransformer->transformCollection($patients->all())
        ]);
    }

    /**
     * Shows details of a single patient
     * @param  [type] $id [description]
     * @return Json      response
     */
    public function show(Patient $patient){
        return $this->respond([
            'data' => $this->patientTransformer->transform($patient)
        ]);
    }

    /**
     * Updates the information of a Patient record
     * @param  integer         $id      Patient identifier
     * @param  PatientRequest $request Form request to validate input
     * @return json                  json object with status code
     */
    public function update(Patient $patient, PatientRequest $request){
        // to test this in POSTMAN the body should be x-www-form-urlencoded ;)
        $user = JWTAuth::parseToken()->authenticate();
        if(Gate::denies('update_patient', $patient)){
            return respondForbidden('Usted no tiene permisos para editar datos de pacientes');
        }
        $patient->update($request->all());
        return $this->respondEdited('Datos del paciente actualizados correctamente');
    }

    /**
     * Creates a new Patient record
     * @param  PatientRequest $request Form request to validate user input
     * @return json                  json object with status code
     */
    public function store(PatientRequest $request){
        $user = JWTAuth::parseToken()->authenticate();

        if(Gate::denies('create_patient')){
            return $this->respondForbidden('Usted no tiene permisos para registrar pacientes');
        }

        $patient = new Patient($request->all());
        $patient->historia = $patient->codHistoria($patient);
        $user->patients()->save($patient);
        $last = Patient::get()->last();

        return $this->respondCreated($last->historia);
    }

    /**
     * Deletes a patient record
     * @param  integer $id Patient identifier
     * @return json     Json object with status code
     */
    public function destroy(Patient $patient){
        if(Gate::allows('delete_patient', $patient)){
            $patient->delete();
            return $this->respondDeleted('Paciente borrado correctamente.');
        }
        else{
            return $this->respondForbidden('Usted no tiene permisos para borrar el paciente');
        }
    }
}
