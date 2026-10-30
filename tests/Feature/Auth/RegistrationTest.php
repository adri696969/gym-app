<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'dni' => '12345678Z',
        'data_naixement' => '2000-01-01',
        'telefon' => '600123456',
    ]);

    $this->assertAuthenticated();

    $response->assertRedirect(route('dashboard', absolute: false));
});
