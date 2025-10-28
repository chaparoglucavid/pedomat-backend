<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'birthdate' => 'required|date',
            'phone' => 'required|string|min:8|unique:users',
        ]);

        $user = User::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => Carbon::parse($request->birthdate),
            'password' => Hash::make($request->password),
            'activity_status' => 'active',
            'system_status' => 'verified',
            'user_current_balance' => 0,
            'type' => 'user'
        ]);

        $token = $user->createToken('mobile')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
