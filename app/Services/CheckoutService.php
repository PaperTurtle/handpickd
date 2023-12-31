<?php

namespace App\Services;

use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Mail\SendOrderConfirmation;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Exception;

/**
 * CheckoutService handles the checkout process for a shopping cart.
 * It processes the checkout by creating transactions and handles success and failure cases.
 */
class CheckoutService
{
    /**
     * Processes the checkout for a given user.
     * It begins a database transaction and attempts to create a Transaction record for each cart item.
     * It sends an order confirmation email upon success or rolls back the transaction on failure.
     *
     * @param User|null $user The user performing the checkout.
     * @param array $buyerData
     * @return array Returns the status of the checkout process along with appropriate messages and transaction details.
     */
    public function processCheckout(?User $user, array $buyerData): array
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
                $buyer = new Buyer(array_merge($buyerData, ['transaction_id' => $transaction->id]));
                $buyer->save();

                $transaction->load('transactionBuyer');
                $transactionDetails[] = $transaction;
                $item->product->decrement('quantity', $item->quantity);
            }

            ShoppingCart::where('user_id', $user->id)->delete();
            DB::commit();
            Mail::to($user->email)->send(new SendOrderConfirmation($user, $transactionDetails));

            return ['status' => 'success', 'message' => 'Your purchase has been completed successfully!', 'transactionDetails' => $transactionDetails];
        } catch (ModelNotFoundException) {
            DB::rollBack();
            return ['status' => 'error', 'message' => 'Product not found.'];
        } catch (Exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => 'An error occurred while processing your order. Please try again.'];
        }
    }
}
