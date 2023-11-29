<?php

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('markAsSent successfully marks a transaction as sent', function () {
    $artisan = User::factory()->create();
    $product = Product::factory()->create(['artisan_id' => $artisan->id]);
    $transaction = Transaction::factory()->create(['product_id' => $product->id]);

    $response = $this->actingAs($artisan)->patch(route('dashboard.markAsSent', ['transaction' => $transaction->id]));

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Product marked as sent']);
});

test('markAsSent returns unauthorized for non-owner user', function () {
    $artisan = User::factory()->create();
    $otherUser = User::factory()->create();
    $product = Product::factory()->create(['artisan_id' => $artisan->id]);
    $transaction = Transaction::factory()->create(['product_id' => $product->id]);

    $response = $this->actingAs($otherUser)->patch(route('dashboard.markAsSent', ['transaction' => $transaction->id]));

    $response->assertStatus(403);
    $response->assertJson(['message' => 'Unauthorized action']);
});
