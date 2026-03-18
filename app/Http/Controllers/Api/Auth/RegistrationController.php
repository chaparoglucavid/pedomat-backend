<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|string|min:8|same:password',
        ], [
            'name.required' => 'Ad və soyad boş ola bilməz',
            'email.required' => 'Email boş ola bilməz',
            'email.email' => 'Email düzgün deyil',
            'email.unique' => 'Bu email artıq qeydiyyatdan keçib',
            'password.required' => 'Şifrə boş ola bilməz',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır',
            'confirmPassword.same' => 'Şifrələr uyğun deyil',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activity_status' => 'active',
            'system_status' => 'verified',
            'user_current_balance' => 0,
            'type' => 'user'
        ]);

        $token = $user->createToken('mobile')->plainTextToken;

        event(new UserRegistered($user));

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
