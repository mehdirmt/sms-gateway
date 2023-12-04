<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(string $username, string $password): array
    {
        $result = Auth::attempt([
            'name'     => $username,
            'password' => $password
        ]);

        if (false === $result) {
            return false;
        }

        return [
            'token'        => $result,
            'token_type'   => 'bearer',
            'token_expire' => config('jwt.ttl', 60) * 60
        ];
    }

    public function logout(): void
    {
        Auth::logout();
    }
}