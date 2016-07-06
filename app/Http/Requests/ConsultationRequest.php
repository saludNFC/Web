<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConsultationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'created_at' => 'required',
            'anamnesis' => 'required|min:10',
            'physical_exam' => 'required|min:10',
            'diagnosis' => 'required|min:10'
        ];
    }
}
