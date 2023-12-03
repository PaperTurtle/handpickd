<?php

use App\Models\Product;
use App\Models\User;

it('stores a new product', function () {
    $this->actingAs(User::factory()->create());
    $productData = Product::factory()->make()->toArray();
    $response = $this->post(route('products.store'), $productData);

    $createdProduct = Product::latest('id')->first();
    $response->assertRedirect(route('products.show', $createdProduct->id));

    $this->assertDatabaseHas('products', $productData);
});

it('updates a product', function () {
    $this->actingAs(User::factory()->create());
    $product = Product::factory()->create();
    $updatedData = [
        'name' => 'Updated Name',
        'description' => 'Updated Description',
        'price' => '10.00',
    ];
    $response = $this->put(route('products.update', $product), $updatedData);
    $response->assertRedirect(route('products.show', $product));
    $this->assertDatabaseHas('products', $updatedData);
});

it('deletes a product', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $product = Product::factory()->create(['artisan_id' => $user->id]);
    $response = $this->delete(route('products.destroy', $product));
    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});
