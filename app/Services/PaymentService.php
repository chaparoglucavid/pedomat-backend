<?php

namespace App\Services;

use App\Models\User;

class PaymentService {
    public function viaBalance(User $user, $totalAmount, $orderId = null)
    {

        if ($user->user_current_balance < $totalAmount) {
            throw new \Exception("Balans kifayət deyil.");
        }
        $user->decrement('user_current_balance', $totalAmount);

        $user->user_transaction_history()->create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'transaction_number' => 'EXP-'.time(),
            'amount' => $totalAmount,
            'payment_via' => 'balance',
            'payment_status' => 200,
            'transaction_type' => 'expense'
        ]);
        return true;
    }

    public function refundToBalance(User $user, $amount, $orderId = null)
    {
        $user->increment('user_current_balance', $amount);
        $user->user_transaction_history()->create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'transaction_number' => 'REF-'.time(),
            'amount' => $amount,
            'payment_via' => 'balance',
            'payment_status' => 200,
            'transaction_type' => 'refund'
        ]);
        return true;
    }

    public function viaCard(User $user, $totalAmount)
    {
        return true;
    }
}
