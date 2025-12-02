<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $this->get('/admin/dashboard')->assertRedirect('/login');
});

test('regular users cannot access admin dashboard', function () {
    $this->actingAs($user = User::factory()->user()->create());

    $this->get('/admin/dashboard')->assertStatus(403);
});

test('admin users can access the admin dashboard', function () {
    $this->actingAs($admin = User::factory()->admin()->create());

    $this->get('/admin/dashboard')->assertStatus(200);
});