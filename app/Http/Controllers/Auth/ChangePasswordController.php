<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('auth.change_password');
    }
    public function update(Request $request)
    {
        $request->validate( [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        try {
            $user = auth()->user();
            if (Hash::check($request->password, $user->password)) {
                return back()->with('errors','لا يمكن أن تكون كلمة المرور الجديدة هي نفسها الحالية');
            }
            $user->password = Hash::make($request['password']);
            $user->save();
            return back()->with('success','success');
        } catch (\Throwable $th) {
            return back()->with('errors', $th->getMessage());
        }

    }

}
