<?php

namespace App\Services;

use App\Models\User;

class PaymentService {
    public function viaBalance(User $user, $totalAmount)
    {

        if ($user->user_current_balance < $totalAmount) {
            throw new \Exception("Balans kifayət deyil.");
        }
        $user->decrement('user_current_balance', $totalAmount);
        return true;
    }

    public function refundToBalance(User $user, $amount)
    {
        $user->increment('user_current_balance', $amount);
        return true;
    }

    public function viaCard(User $user, $totalAmount)
    {
        return true;
    }
}
