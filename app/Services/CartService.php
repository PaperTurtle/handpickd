<?php

namespace App\Services;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

/**
 * CartService is responsible for managing the shopping cart functionality.
 * It offers methods to add products to the shopping cart.
 */
class CartService
{
    /**
     * Adds a product to the shopping cart or updates its quantity if it already exists.
     * It checks if the product is already in the cart for the current user.
     * If it is, it updates the quantity; if not, it creates a new cart item.
     *
     * @param int $productId The ID of the product to add to the cart.
     * @param int $quantity The quantity of the product to add.
     * @return array Returns a success message upon successful addition.
     */
    public function addToCart($productId, $quantity): array
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
