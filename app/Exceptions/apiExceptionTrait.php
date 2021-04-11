<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Exception;

trait apiExceptionTrait
{
    public function apiException($request,$e){

        if($e instanceof ModelNotFoundException){
            return response()->json([
                'errors'=>'model not found'
            ],404);
        }
        if($e instanceof NotFoundHttpException){
            return response()->json([
                'errors'=>'incorrect route'
            ],404);
        }
    }
}
