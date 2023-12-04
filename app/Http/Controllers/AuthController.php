<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    )
    {}

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $token = $this->authService->login($validated['username'], $validated['password']);

        if (false === $token) {
            return response()->json([
                'message' => 'invalid credentials',
                'data'    => []
            ], 401);
        }

        return response()->json([
            'message' => 'login success',
            'data'    => $token
        ]);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->json([
            'message' => 'logout success',
            'data'    => []
        ]);
    }
}
