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
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return mixed
     */
    public function view(User $user, ShoppingCart $shoppingCart)
    {
        return $user->id === $shoppingCart->user_id;
    }

    /**
     * Determine whether the user can add an item to the shopping cart.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function addToCart(User $user)
    {
        return $user ? true : false;
    }

    /**
     * Determine whether the user can update an item in the shopping cart.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return mixed
     */
    public function update(User $user, ShoppingCart $shoppingCart)
    {
        return $user->id === $shoppingCart->user_id;
    }

    /**
     * Determine whether the user can remove an item from the shopping cart.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return mixed
     */
    public function removeFromCart(User $user, ShoppingCart $shoppingCart)
    {
        return $user->id === $shoppingCart->user_id;
    }
}
