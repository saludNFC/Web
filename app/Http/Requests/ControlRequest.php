<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Control;
use Auth;

class ControlRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // switch($this->method()){
        //     case 'POST':{
        //         return true;
        //         break;
        //     }
        //     case 'PATCH':{
        //         $controlId = $this->route('id');
        //         return Control::where('id', $controlId)
        //             ->where('user_id', Auth::user()->id)->exists();
        //         break;
        //     }
        //     default:break;
        // }
        // if($this->method() === 'PATCH'){
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'control_type' => 'required',

            // Vacunacion
            'vaccine' => 'required_if:control_type,Vacunacion',
            'via' => 'required_if:control_type,Vacunacion',
            'dosis' => 'required_if:control_type,Vacunacion|digits_between:1,5',

            // Crecimiento y Desarrollo
            'weight' => 'required_if:control_type,Crecimiento',
            'height' => 'required_if:control_type,Crecimiento',

            // Triaje
            'temperature' => 'required_if:control_type,Triaje',
            'heart_rate' => 'required_if:control_type,Triaje',
            'sistole' => 'required_if:control_type,Triaje',
            'diastole' => 'required_if:control_type,Triaje',

            // Ginecologico
            'last_menst' => 'required_if:control_type,Ginecologico'
            // 'last_mamo' => 'date',
            // 'last_papa' => 'date',

            // Geriatrico
            'geriatric_type' => 'required_if:control_type,Geriatrico',
            'notes' => 'required_if:control_type,Geriatrico|min:10'
        ];
    }
}
