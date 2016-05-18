<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;
use App\Http\Requests;
use App\Patient;
use App\History;
use App\User;
use Auth;
use Gate;
use Api\Formatters\HistoryTransformer;

class ApiHistoryController extends ApiController
{
    /**
     * @var Api\Formatters\HistoryTransformer
     */
    protected $historyTransformer;

    /**
     * @param PatientTransformer $transformer [description]
     */
    public function __construct(HistoryTransformer $transformer){
        $this->historyTransformer = $transformer;
        $this->middleware('auth.basic');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patientID){
        $histories = History::where('patient_id', '=', $patientID)->get();
        return $this->respond([
            'data' => $this->historyTransformer->transformCollection($histories->all())
        ]);
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
    public function show($id)
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
