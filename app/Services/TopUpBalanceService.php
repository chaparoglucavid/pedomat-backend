<?php

namespace App\Services;

use App\Models\User;

class TopUpBalanceService {
    public function viaCard(User $user, $amount)
    {

        $user->increment('user_current_balance', $amount);

        $user->user_transaction_history()->create([
            'user_id' => $user->id,
            'transaction_number' => 'INC-'.time(),
            'amount' => $amount,
            'payment_via' => 'card',
            'payment_status' => 200,
            'transaction_type' => 'income'
        ]);
        return true;
    }

    public function viaTerminal(User $user, $amount)
    {

        $user->increment('user_current_balance', $amount);

        $user->user_transaction_history()->create([
            'user_id' => $user->id,
            'transaction_number' => 'INC-'.time(),
            'amount' => $amount,
            'payment_via' => 'terminal',
            'payment_status' => 200,
            'transaction_type' => 'income'
        ]);
        return true;
    }
}
