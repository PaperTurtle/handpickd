<?php

use App\Models\ShoppingCart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('adds a product to the authenticated user\'s shopping cart', function () {
    $user = User::factory()->create();

    $product = Product::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('cart.add'), [
        'product_id' => $product->id,
        'quantity' => 1,
    ]);

    $response->assertStatus(200);

    $response->assertJson(['success' => 'Product added to cart!']);
});

it('removes an item from the shopping cart by its item ID', function () {
    $user = User::factory()->create();

    $cartItem = ShoppingCart::factory()->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user);

    $response = $this->delete(route('cart.remove', ['cartItem' => $cartItem->id]));

    $response->assertStatus(200);

    $response->assertJson(['success' => 'Product removed from cart!']);
});

it('redirects to the login page when the user is not authenticated', function () {
    $product = Product::factory()->create();

    $response = $this->post(route('cart.add'), [
        'product_id' => $product->id,
        'quantity' => 1,
    ]);

    $response->assertRedirect(route('login'));
});

it('updates the quantity of a product that already exists in the cart', function () {
    $user = User::factory()->create();

    $product = Product::factory()->create();

    $cartItem = ShoppingCart::factory()->create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'quantity' => 1,
    ]);

    $this->actingAs($user);

    $response = $this->patch(route('cart.update', ['itemId' => $cartItem->id]), [
        'quantity' => 2,
    ]);

    $response->assertStatus(200);

    $response->assertJson(['success' => 'Cart updated successfully']);

    $cartItem->refresh();

    $this->assertEquals(2, $cartItem->quantity);
});

it('creates a new cart item when the product does not exist in the cart', function () {
    $user = User::factory()->create();

    $product = Product::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('cart.add'), [
        'product_id' => $product->id,
        'quantity' => 1,
    ]);

    $response->assertStatus(200);

    $response->assertJson(['success' => 'Product added to cart!']);

    $this->assertDatabaseHas('shopping_carts', [
        'user_id' => $user->id,
        'product_id' => $product->id,
        'quantity' => 1,
    ]);
});

test('processCheckout processes the checkout successfully', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/checkout/process');

    $response->assertRedirect('checkout/success');
    $response->assertSessionHas('success');
    $response->assertSessionHas('transactionDetails');
});
