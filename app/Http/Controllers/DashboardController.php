<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

/**
 * The DashboardController handles listing user-specific transactions and marking transactions as sent.
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of transactions related to the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $transactions = Transaction::with('product')
            ->whereHas('product', function ($query) {
                $query->where('artisan_id', auth()->id());
            })
            ->get();

        return view('dashboard', compact('transactions'));
    }

    /**
     * Mark a transaction as sent.
     * This function updates the status of a transaction to 'sent' if the authenticated user is authorized to do so.
     *
     * @param Transaction $transaction The transaction to be marked as sent.
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsSent(Transaction $transaction)
    {
        if ($transaction->product->artisan_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized action'], 403);
        }

        $transaction->update(['status' => 'sent']);

        return response()->json(['message' => 'Product marked as sent'], 200);
    }
}
