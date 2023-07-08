<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginInvalidException extends Exception
{
    /**
     * The function returns a JSON response with an error message and status code for unauthorized
     * access.
     * 
     * @return JsonResponse A JsonResponse object is being returned.
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error'   => class_basename($this),
            'message' => 'Invalid email or password'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
