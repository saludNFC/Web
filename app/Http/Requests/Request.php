<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

abstract class Request extends FormRequest
{
    /*
    * This overrides the response method in Illuminate/Foundation/Http/FormRequest.php
    * so in this way when the request url contains /api on it (when I'm working in my API REST)
    * the response will be a JsonResponse instance, ioc it redirects me, with input and the error bag!!!
    * MAYBE THERE'S A BETTER WAY TO DO THIS, BUT IT WORKS FOR ME :3
    */

    public function response(array $errors)
    {
        if(str_contains($this->url(), '/api')){
            return new JsonResponse($errors, 422);
        }
        else{
            return $this->redirector->to($this->getRedirectUrl())
                        ->withInput($this->except($this->dontFlash))
                        ->withErrors($errors, $this->errorBag);
        }
    }
}
