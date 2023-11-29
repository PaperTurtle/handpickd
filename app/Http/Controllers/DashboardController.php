<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * The DashboardController is responsible for handling user-specific operations in a dashboard setting.
 * This includes displaying a list of transactions related to the authenticated user and marking transactions as sent.
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of transactions related to the authenticated user.
     * Retrieves transactions associated with the products of the authenticated user, typically an artisan,
     * and passes them to the dashboard view.
     *
     * @return Factory|View Returns a view of the dashboard with transaction details.
     */
    public function index(): Factory|View
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
     * Updates the status of a transaction to 'sent' if the authenticated user (an artisan) is authorized to do so.
     * Responds with JSON indicating the success or unauthorized access of the operation.
     *
     * @param Transaction $transaction The transaction to be marked as sent.
     * @return JsonResponse Returns JSON response with a success message or an unauthorized access message.
     */
    public function markAsSent(Transaction $transaction): JsonResponse
    {
<<<<<<< HEAD
        if ($transaction->product->artisan_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized action'], 403);
        }
=======
        // if ($transaction->product->artisan_id !== Auth::id()) {
        //     return response()->json(['message' => 'Unauthorized action'], 403);
        // }
>>>>>>> parent of 4928782 (TODO: Fix Auth)

        $transaction->update(['status' => 'sent']);

        return response()->json(['message' => 'Product marked as sent']);
    }
}
