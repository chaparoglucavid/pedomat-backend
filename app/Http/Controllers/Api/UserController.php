<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'phone' => 'nullable|string',
        ]);

        $user = $request->user();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return response()->json([
            'message' => 'Məlumatlar müvəffəqiyyətlə yeniləndi',
            'user' => $user
        ], 200);
    }

    public function getUserTransactionHistory()
    {
        $user = Auth::user();

        $transactionHistory = $user->user_transaction_history()->get();

        return response()->json([
            'success' => true,
            'data' => $transactionHistory
        ]);
    }
}
