<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ShoppingCart;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingCartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the shopping cart item.
     *
     * @param User $user
     * @param ShoppingCart $shoppingCart
     * @return bool
     */
    public function view(User $user, ShoppingCart $shoppingCart): bool
    {
        return $user->id === $shoppingCart->user_id;
    }

    /**
     * Determine whether the user can add an item to the shopping cart.
     *
     * @param User $user
     * @return bool
     */
    public function addToCart(User $user): bool
    {
        return (bool)$user;
    }

    /**
     * Determine whether the user can update an item in the shopping cart.
     *
     * @param User $user
     * @param ShoppingCart $shoppingCart
     * @return bool
     */
    public function update(User $user, ShoppingCart $shoppingCart): bool
    {
        return $user->id === $shoppingCart->user_id;
    }

    /**
     * Determine whether the user can remove an item from the shopping cart.
     *
     * @param User $user
     * @param ShoppingCart $shoppingCart
     * @return bool
     */
    public function removeFromCart(User $user, ShoppingCart $shoppingCart): bool
    {
        return $user->id === $shoppingCart->user_id;
    }
}
