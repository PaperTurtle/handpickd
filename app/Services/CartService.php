<?php

namespace App\Services;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function addToCart($productId, $quantity)
    {
        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return ['success' => 'Product added to cart!'];
    }
}
