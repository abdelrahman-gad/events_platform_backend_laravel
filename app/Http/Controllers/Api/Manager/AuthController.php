<?php

namespace App\Http\Controllers\Api\Manager;

use App\Http\Controllers\Controller;

use App\Models\Manager;
use App\Http\Requests\Manager\Auth\RegisterRequest;
use App\Http\Requests\Manager\Auth\SigninRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin(SigninRequest $request) {
        $manager = Manager::where('email', $request->email)
                      ->first();
        // Check password
        if(!$manager || !Hash::check($request->password, $manager->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $manager->createToken(env('APP_SANCTUM_TOKEN'))->plainTextToken;

        $response = [
            'manager' => $manager,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout() {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'User Logged out successfully'
        ];
    }

}
