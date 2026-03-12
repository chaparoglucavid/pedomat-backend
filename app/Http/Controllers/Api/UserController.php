<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // admin-only in production; adjust middleware as needed
        $users = User::paginate(20);
        return UserResource::collection($users);
    }

    public function show($id)
    {
        try {
            $user = User::with(['user_transaction_history', 'orders.equipment', 'orders.order_details.ped_category'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'birthdate' => $user->birthdate,
                    'activity_status' => $user->activity_status,
                    'system_status' => $user->system_status,
                    'user_current_balance' => $user->user_current_balance,
                    'type' => $user->type,
                    'created_at' => $user->created_at,
                    'transactions' => $user->user_transaction_history,
                    'orders' => $user->orders
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'İstifadəçi tapılmadı'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|string|max:20',
                'birthdate' => 'nullable|date',
                'system_status' => 'required|in:verified,unverified,banned,deactivated',
                'activity_status' => 'required|in:active,inactive',
            ]);

            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'İstifadəçi məlumatları yeniləndi',
                'user' => new UserResource($user)
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Yenilənmə zamanı xəta baş verdi', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'İstifadəçi tapılmadı'], 404);
            }

            $statusInput = $request->input('system_status');
            if (!$statusInput) {
                return response()->json(['message' => 'Status dəyəri tələb olunur'], 422);
            }

            $allowed = ['verified', 'unverified', 'banned', 'deactivated'];
            if (!in_array($statusInput, $allowed, true)) {
                return response()->json(['message' => 'Status dəyəri düzgün deyil'], 422);
            }

            $user->system_status = $statusInput;
            $user->save();

            return response()->json(new UserResource($user), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Status güncəllənmədi', 'error' => $e->getMessage()], 500);
        }
    }

    public function me(Request $request)
    {
        return new UserResource($request->user());
    }

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
                'user' => new UserResource($user)
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

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $transactionHistory = $user->user_transaction_history()->get();

        return response()->json([
            'success' => true,
            'message' => 'Hesab məlumatları müvəffəqiyyətlə yeniləndi',
            'data' => $transactionHistory
        ], 200);
    }
}
