<?php

namespace Tests\Feature;

use App\Http\Controllers\ChatAIController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatAITest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateChat(): void
    {
        $this->post('/api/chat', [
            'messages' => [
                [
                    "role" => "user",
                    "content" => 'Apa itu Energi Terbarukan?'
                ]
            ]
        ])->assertJsonStructure([
            "data"
        ])->dump();
    }

    public function testFailedCreateChat(): void
    {
        $this->post('/api/chat', [
            'messages' => [
                [
                    "role" => "presiden",
                    "content" => 'Siapa kamu?'
                ],
                [
                    "role" => "PDIP",
                    "content" => 'Siapa kamu?'
                ]
            ]
        ])->assertJson([
            "code" => 400,
            "errors" => [

            ]
        ]);
    }

}
