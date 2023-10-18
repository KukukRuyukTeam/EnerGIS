<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testRegisterAdmin()
    {
        $this->post('/api/admin', [
            'email' => 'sukriyatma@gmail.com',
            'password' => 'passwordlangka',
            'nama' => 'Admin Spesial :)'
        ])
            ->assertJson([
                'data' => [
                    'email' => 'sukriyatma@gmail.com',
                    'nama' => 'Admin Spesial :)'
                ]
            ]);
    }


    public function testLoginAdmin()
    {
        $this->testRegisterAdmin();
        $response = $this->post('/api/admin/login', [
            'email' => 'sukriyatma@gmail.com',
            'password' => 'passwordlangka'
        ])
            ->assertJson([
                'data' => [
                    'email' => 'sukriyatma@gmail.com',
                    'nama' => 'Admin Spesial :)'
                ]
            ]);

        return $response['data']['token'];
    }

    public function testAuthorization()
    {
        $token = $this->testLoginAdmin();
        $this->get('/api/admin/current', [
            'Authorization' => $token
        ])
            ->assertJson([
                "data" => [
                    'email' => 'sukriyatma@gmail.com',
                    'nama' => 'Admin Spesial :)'
                ]
            ]);
    }

    public function testLogoutAdmin()
    {
        $token = $this->testLoginAdmin();
        $this->post('/api/admin/logout',
            headers: ['Authorization' => $token]
        )
            ->assertJson(["status" => true]);
    }
}
