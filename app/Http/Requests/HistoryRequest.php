<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use App\History;
use Auth;

class HistoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // switch($this->method()){
        //     case 'POST':{
        //         // Modify when you have user roles and permissions implemented
        //         return true;
        //         break;
        //     }
        //     case 'PATCH':{
        //         // Authorize the owner user to edit a record
        //         $historyId = $this->route('id');
        //         $history = History::where('id', $historyId);
        //         if($history->user_id == Auth::user()->id){
        //             return true;
        //         }
        //         else{
        //             return false;
        //         }
        //         // return History::where('id', $historyId)
        //         //     ->where('user_id', Auth::user()->id)->exists();
        //         break;
        //     }
        //     default:break;
        // }
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
            'history_type' => 'required',

            // Antecedente familiar
            'grade' => 'required_if:history_type,Familiar|min:3',
            'illness' => 'required_if:history_type,Familiar|min:3',

            // Antecedente personal
            'type_personal' => 'required_if:history_type,Personal',
            'description' => 'required_if:history_type,Personal|min:7',

            // Antecedente de medicamentos
            'med' => 'required_if:history_type,Medicamentos',
            'via' => 'required_if:history_type,Medicamentos',
            'date_ini' => 'required_if:history_type,Medicamentos'
        ];
    }
}
