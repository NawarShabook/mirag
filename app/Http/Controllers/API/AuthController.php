<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use OneSignal;

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
                'onesignal_playerid' => $data['one_signal_id'] ?? null,
            ]);

            $token = $user->createToken($request->name);
            if ($user->onesignal_playerid) {
                OneSignal::sendNotificationToUser(
                    "أهلا بك ($user->name) في ميراج",
                    $user->onesignal_playerid,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
            }

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
                'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $user = User::where('email', $request->email)
             ->first(['id','name','email','city','password']);

            if (!$user || !Hash::check($request->password, $user->password)) {

                return response()->json([
                    'message' => 'The provided credentials are incorrect.',
                ], 401);

                // return [
                //     'message' => 'The provided credentials are incorrect.'
                // ];
            }

            if($request->onesignal_id){
                $user->onesignal_playerid = $request->onesignal_id;
                $user->save();

                OneSignal::sendNotificationToUser(
                    "أهلا بك ($user->name) في ميراج",
                    $request->onesignal_id,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
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
    public function user_profile(Request $request)
    {
        return $request->user()->only(['id', 'name', 'email','city']);
    }


    public function change_password(Request $request)
    {
        $request->validate( [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $user = auth()->user();
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => 'لا يمكن أن تكون كلمة المرور الجديدة هي نفسها الحالية',
                ], 422); // HTTP 422 Unprocessable Entity
            }
            $user->password = Hash::make($request['password']);
            $user->save();
            return response()->json([
                'message' => 'Success.',
            ], 200);
        } catch (ValidationException $e) {
            // Return validation errors as JSON
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422); // HTTP 422 Unprocessable Entity
        }

    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'city' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'one_signal_id' => ['nullable', 'string','max:255'],
        ]);
    }
}
