<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Patient;
use App\History;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Api\Transformers\HistoryTransformer;
use Auth;

class ApiHistoryController extends ApiController
{
    protected $historyTransformer;

    function __construct(HistoryTransformer $ht){
        $this->historyTransformer = $ht;
        $this->middleware('auth.basic', ['on' => 'post']);
    }

    public function index($id){
        $histories = Patient::findOrFail($id)->history;
        // return $histories;
        return $this->respond([
            'data' => $this->historyTransformer->transformCollection($histories->all())
        ]);
    }
}
