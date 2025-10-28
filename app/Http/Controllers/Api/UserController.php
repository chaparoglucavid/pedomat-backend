<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'phone' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $user = $request->user();
            $user->full_name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Məlumatlar müvəffəqiyyətlə yeniləndi',
                'user' => $user
            ], 200);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getUserTransactionHistory()
    {
        $user = Auth::user();

        $transactionHistory = $user->user_transaction_history()->get();

        return response()->json([
            'success' => true,
            'message' => 'Hesab məlumatları müvəffəqiyyətlə yeniləndi',
            'data' => $transactionHistory
        ], 200);
    }
}
