<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserTransactionHistory;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    // using route protection; keep controller methods simple

    public function __construct()
    {
        // optional: protect via middleware at route level; constructor left intentionally minimal
    }

    // admin or user depending on requirement; here admin can fetch all
    public function index()
    {
        $histories = UserTransactionHistory::with('user')->orderBy('created_at', 'desc')->paginate(20);
        return \App\Http\Resources\TransactionHistoryResource::collection($histories);
    }

    public function show($id)
    {
        $history = UserTransactionHistory::with('user')->findOrFail($id);
        return new \App\Http\Resources\TransactionHistoryResource($history);
    }
}
