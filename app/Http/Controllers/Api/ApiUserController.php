<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use Api\Formatters\UserTransformer;

class ApiUserController extends ApiController{

    /**
     * @var Api\Formatters\UserTransformer
    */
    protected $userTransformer;

    public function __construct(UserTransformer $transformer){
        $this->userTransformer = $transformer;
        $this->middleware('auth.basic');
    }

    /**
     * Displays a list of all users
     * @return Json response
     */
    public function index(){
        $users = User::all();
        return $this->respond([
            'data' => $this->userTransformer->transformCollection($users->all())
        ]);
    }

    /**
     * Shows details of a single user
     * @param  integer $id
     * @return Json      response
     */
    public function show(User $user){
        return $this->respond([
            'data' => $this->userTransformer->transform($user)
        ]);
    }

    /**
     * Updates the information of a User record
     * @param  integer         $id      User identifier
     * @param  UserRequest $request Form request to validate input
     * @return json                  json object with status code
     */
    public function update(User $user, UserRequest $request){
        // to test this in POSTMAN the body should be x-www-form-urlencoded ;)
        $user->password = bcrypt($request->password);
        $user->update($request->except('password', 'password_confirmation'));
        return $this->respondEdited('Datos del usuario actualizados correctamente');
    }

    /**
     * Creates a new User record
     * @param  UserRequest $request Form request to validate user input
     * @return json                  json object with status code
     */
    public function store(UserRequest $request){
        $user = new User($request->except('password', 'password_confirmation'));
        $user->password = bcrypt($request->password);
        $user->save();
        return $this->respondCreated('Datos del usuario guardados correctamente');
    }

    /**
     * Deletes a user record
     * @param  integer $id User identifier
     * @return json     Json object with status code
     */
    public function destroy(User $user){
        $user->delete();
        return $this->respondDeleted('Usuario borrado correctamente.');
    }
}
