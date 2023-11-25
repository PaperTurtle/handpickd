<?php

namespace App\Services;

use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Mail\SendOrderConfirmation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Exception;

class CheckoutService
{
    public function processCheckout($user)
    {
        DB::beginTransaction();

        try {
            $cartItems = ShoppingCart::with('product')->where('user_id', $user->id)->get();
            $transactionDetails = [];

            foreach ($cartItems as $item) {
                $transaction = Transaction::create([
                    'buyer_id' => $user->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'total_price' => $item->quantity * $item->product->price,
                    'status' => 'pending',
                ]);

                $transactionDetails[] = $transaction;
                $item->product->decrement('quantity', $item->quantity);
            }

            ShoppingCart::where('user_id', $user->id)->delete();
            DB::commit();
            Mail::to($user->email)->send(new SendOrderConfirmation($user, $transactionDetails));

            return ['status' => 'success', 'message' => 'Your purchase has been completed successfully!', 'transactionDetails' => $transactionDetails];
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return ['status' => 'error', 'message' => 'Product not found.'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => 'error', 'message' => 'An error occurred while processing your order. Please try again.'];
        }
    }
}
