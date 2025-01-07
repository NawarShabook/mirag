<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{


    public function register(Request $request)
    {

        try {
            $data = $this->validator($request->all())->validate();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'city' => $data['city'],
                'password' => Hash::make($data['password']),
            ]);

            $token = $user->createToken($request->name);

            return [
                'user' => $user,
                'token' => $token->plainTextToken
            ];
        } catch (ValidationException $e) {
            // Return validation errors as JSON
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422); // HTTP 422 Unprocessable Entity
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return [
                    'errors' => [
                        'email' => ['The provided credentials are incorrect.']
                    ]
                ];
                // return [
                //     'message' => 'The provided credentials are incorrect.'
                // ];
            }

            $token = $user->createToken($user->name);

            return [
                'user' => $user,
                'token' => $token->plainTextToken
            ];
        } catch (ValidationException $e) {
            // Return validation errors as JSON
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422); // HTTP 422 Unprocessable Entity
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'city' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
