<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TopUpBalanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBalanceController extends Controller
{
    public function topUpBalance(Request $request, TopUpBalanceService $topUpBalanceService)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
            'paymentMethod' => 'required|string|in:card,terminal'
        ]);

        $user = Auth::user();
        $paymentMethod = $validatedData['paymentMethod'];
        $amount = $validatedData['amount'];

        DB::beginTransaction();

        try {

            if ($paymentMethod === 'card') {
                $topUpBalanceService->viaCard($user, $amount);
            } elseif ($paymentMethod === 'terminal') {
                $topUpBalanceService->viaTerminal($user, $amount);
            }

            DB::commit();

            return response()->json([
                'message' => "Balans müvəffəqiyyətlə {$amount} AZN artırıldı",
                'success' => true,
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => 'Balans artırılarkən xəta baş verdi.',
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
