<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin;

use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Admin\Auth\SigninRequest;

use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{

    public function signin(SigninRequest $request) {

        $admin = Admin::where('email', $request->email)
                      ->first();

        // Check password
        if(!$admin || !Hash::check($request->password, $admin->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $admin->createToken(env('APP_SANCTUM_TOKEN'))->plainTextToken;

        $response = [
            'admin' => $admin,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout() {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Admin Logged out successfully'
        ];
    }

}
