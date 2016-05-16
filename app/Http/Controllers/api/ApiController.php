<?php

namespace App\Http\Controllers\api;

// use Illuminate\Http\Request;
//
// use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;

    public function getStatusCode(){
        return $this->statusCode;
    }

    public function setStatusCode($statusCode){
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond($data, $headers = []){
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message){
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function respondWithSuccess($message){
        return $this->respond([
            'exito' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function respondNotFound($message = 'No encontrado'){
        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respondFormError($message = 'Datos insuficientes'){
        return $this->setStatusCode(422)->respondWithError($message);
    }

    public function respondCreated($message = 'Creado exitosamente'){
        return $this->setStatusCode(201)->respondWithSuccess($message);
    }
}
