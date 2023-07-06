<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AuthRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    /**
     * The function is a constructor that takes an instance of the AuthService class as a parameter and
     * assigns it to the  property of the current object.
     * 
     * @param AuthService authService The `` parameter is an instance of the `AuthService`
     * class. It is being injected into the constructor of the current class.
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * The login function takes in an authenticated request, validates the input, generates a token
     * using the email and password, and returns a UserResource with the authenticated user and
     * additional token information.
     * 
     * @param AuthRequest request The  parameter is an instance of the AuthRequest class. It is
     * used to retrieve the input data from the user's login request. The AuthRequest class is
     * responsible for validating the input data and ensuring that it meets the required criteria.
     * 
     * @return UserResource a UserResource object, which represents a user resource in the application.
     * The UserResource object is being passed the authenticated user object (retrieved using
     * `auth()->user()`) as a parameter. Additionally, the function is calling the `additional()` method
     * on the UserResource object and passing the `` variable as a parameter. This method is used
     * to add extra data to
     */
    public function login(AuthRequest $request): UserResource
    {
        $input = $request->validated();
        $token = $this->authService->login($input['email'], $input['password']);

        return (new UserResource(auth()->user()))->additional($token);
    }
}
