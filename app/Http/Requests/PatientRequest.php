<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PatientRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        // Does the authenticated user have permissions to perform this request?
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'ci' => ['required', 'size:7', 'unique:patients,ci', 'regex:/^[0-9]*$/'],
            'emision' => 'required',
            'nombre' => 'required|min:2',
            'apellido' => 'required|min:2',
            'fecha_nac' => 'required',
            'lugar_nac' => 'required',
            'grupo_sanguineo' => 'required'
        ];
    }
}
