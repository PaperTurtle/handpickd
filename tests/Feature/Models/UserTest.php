<?php

use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;

it('can have multiple products', function () {
    $user = \App\Models\User::factory()->hasProducts(3)->create();

    expect($user->products)->toHaveCount(3);
    expect($user->products->first())->toBeInstanceOf(Product::class);
});

it('can have multiple reviews', function () {
    $user = \App\Models\User::factory()->has(Review::factory()->count(3))->create();

    expect($user->reviews)->toHaveCount(3);
    expect($user->reviews->first())->toBeInstanceOf(Review::class);
});

it('can have multiple transactions as a buyer', function () {
    $user = \App\Models\User::factory()->has(Transaction::factory()->count(2), 'transactions')->create();

    expect($user->transactions)->toHaveCount(2);
    expect($user->transactions->first())->toBeInstanceOf(Transaction::class);
});

it('can be created', function () {
    $user = \App\Models\User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('can update attributes', function () {
    $user = \App\Models\User::factory()->create();

    $user->update(['name' => 'Jane Doe']);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Jane Doe',
    ]);
});

it('hides certain attributes', function () {
    $user = \App\Models\User::factory()->create();

    $userArray = $user->toArray();

    expect($userArray)->not->toHaveKey('password');
    expect($userArray)->not->toHaveKey('remember_token');
});
