<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')
            ->whereHas('product', function ($query) {
                $query->where('artisan_id', auth()->id());
            })
            ->get();

        return view('dashboard', compact('transactions'));
    }

    public function markAsSent(Transaction $transaction)
    {
        if ($transaction->product->artisan_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized action'], 403);
        }

        $transaction->update(['status' => 'sent']);

        return response()->json(['message' => 'Product marked as sent'], 200);
    }
}
