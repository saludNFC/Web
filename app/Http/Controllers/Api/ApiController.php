<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * HTTP status code of the request
     * @var integer
     */
    protected $statusCode = 200;

    /**
    * Get the value of HTTP status code of the request
    *
    * @return integer
    */
    public function getStatusCode(){
       return $this->statusCode;
    }

    /**
    * Set the value of HTTP status code of the request
    * @param integer statusCode
    * @return self
    */
    public function setStatusCode($statusCode){
       $this->statusCode = $statusCode;
       return $this;
    }

    /**
     * Return json response according data, status code and headers
     * @param  array $data    set of key-value
     * @param  array $headers response headers
     * @return json response
     */
    public function respond($data, $headers = []){
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * Default response when there is an error status code
     * @param  string $message error message
     * @return error json response
     */
    public function respondWithError($message){
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * Default response when there is not error
     * @param  string $message success message
     * @return mixed
     */
    public function respondWithSuccess($message){
        return $this->respond([
            'success' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * When the error type is 404
     * @param  string $message Error message
     * @return mixed
     */
    public function respondNotFound($message = 'Recurso no encontrado'){
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * Resource created properly
     * @param  string $message success message
     * @return mixed
     */
    public function respondCreated($message = 'Recurso creado'){
        return $this->setStatusCode(201)->respondWithSuccess($message);
    }

    /**
     * Resource edited properly
     * @param  string $message success message
     * @return mixed
     */
    public function respondEdited($message = 'Recurso editado'){
        return $this->setStatusCode(201)->respondWithSuccess($message);
    }

    /**
     * Resource deleted properly
     * @param  string $message success message
     * @return mixed
     */
    public function respondDeleted($message = 'Recurso editado'){
        return $this->setStatusCode(200)->respondWithSuccess($message);
    }
}
