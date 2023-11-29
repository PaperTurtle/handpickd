<?php

use App\Models\User;

it('updates user profile information', function () {
    $user = User::factory()->create();
    $updatedData = [
        'name' => 'New Name',
        'email' => 'newemail@example.com',
    ];

    $this->actingAs($user)
        ->patch(route('profile.update'), $updatedData)
        ->assertRedirect(route('profile.edit'))
        ->assertSessionHas('status', 'profile-updated');

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'New Name',
        'email' => 'newemail@example.com',
    ]);
});

it('deletes the user account', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->delete(route('profile.destroy'), ['password' => 'password'])
        ->assertRedirect('/')
        ->assertSessionHas('status');

    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});
