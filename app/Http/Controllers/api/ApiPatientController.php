<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Patient::all(); BAD PRACTICE
        $patients = Patient::all();
        return response()->json([
            'data' => $this->transformCollection($patients)
        ], 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        if(! $patient){
            return response()->json([
                'error' => [
                    'mensaje' => 'No existe el paciente solicitado'
                ]
            ], 404);
        }
        return response()->json([
            'data' => $this->transform($patient)
        ], 200);
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

    private function transformCollection($patients){
        return array_map([$this, 'transform'], $patients->toArray());
    }

    private function transform($patient){
        return [
            'historia_clinica' => $patient['historia'],
            'nombre' => $patient['nombre'],
            'apellido' => $patient['apellido'],
            'ci' => $patient['ci'],
            'emision' => $patient['emision'],
            'sexo' => $patient['sexo'],
            'fecha_nacimiento' => $patient['fecha_nac'],
            'lugar_nacimiento' => $patient['lugar_nac'],
            'grado_instruccion' => $patient['grado_instruccion'],
            'estado_civil' => $patient['estado_civil'],
            'ocupacion' => $patient['ocupacion'],
            'grupo_sanguineo' => $patient['grupo_sanguineo']
        ];
    }
}
