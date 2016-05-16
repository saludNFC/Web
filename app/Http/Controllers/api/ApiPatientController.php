<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests;
// use App\Http\Requests\PatientRequest;
use App\Http\Controllers\Controller;
use Api\Transformers\PatientTransformer;
use Illuminate\Support\Facades\Request as RequestFacade;
use Auth;

class ApiPatientController extends ApiController
{
    protected $patientTransformer;
    protected $validator;

    function __construct(PatientTransformer $patientTransformer){
        $this->patientTransformer = $patientTransformer;
        $this->middleware('auth.basic', ['on' => 'post']);
        // $this->validator = $patientRequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Patient::all(); BAD PRACTICE
        $patients = Patient::all();
        return $this->respond([
            'data' => $this->patientTransformer->transformCollection($patients->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! $request->nombre or ! $request->apellido or ! $request->ci){
            return $this->respondFormError('Los datos proporcionados no son suficientes para crear un paciente');
        }

        $newPatient = new Patient($request->all());
        $newPatient->emision = 'BN';
        $newPatient->historia = $newPatient->codHistoria($newPatient);

        Auth::user()->patients()->save($newPatient);
        return $this->respondCreated('Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        if(! $patient ){
            return $this->respondNotFound('Paciente no encontrado');
        }
        return $this->respond([
            'data' => $this->patientTransformer->transform($patient)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
