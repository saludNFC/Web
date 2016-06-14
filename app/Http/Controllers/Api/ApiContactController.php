<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Api\Formatters\ContactTransformer;
use App\Http\Requests\ContactRequest;
use App\Http\Requests;
use App\Patient;
use App\Contact;
use JWTAuth;
use Gate;
use DB;

class ApiContactController extends ApiController
{
    /**
     * @var Api\Formatters\ConsultationTransformer
     */
    protected $contactTransformer;

    /**
     * @param ConsultationTransformer $transformer
     */
    public function __construct(ContactTransformer $transformer){
        $this->contactTransformer = $transformer;
        $this->middleware('jwt.auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient){
        $contact = $patient->contact()->get();
        return $this->respond([
            'data' => $this->contactTransformer->transformCollection($contact->all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Patient $patient, ContactRequest $request){
        $user = JWTAuth::parseToken()->authenticate();

        if(Gate::denies('create_contact')){
            return $this->respondForbidden('Usted no tiene permisos para crear contactos de pacientes');
        }
        $contact = new Contact($request->all());
        $contact->patient_id = $patient->id;
        // $consultation->user_id = 1;
        // $consultation->save();
        $user->contacts()->save($contact);

        return $this->respondCreated('Contacto creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Contact $contact){
        /**
         * TODO
         */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient, Contact $contact, ContactRequest $request){
        /**
         * TODO
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, Contact $contact){
        /**
         * TODO
         */
    }
}
