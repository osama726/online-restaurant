<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    public function register(RegisterRequest $request)
    {
        // Create a new user
        $user = User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'] ?? null,
            'password' => bcrypt($request['password']),
        ]);

        // Return a response
        return $this->successResponse([
            'user' => $user,
            'User registered successfully',
        ], 201);
    }
}
