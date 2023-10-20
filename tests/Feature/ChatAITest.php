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
                    "content" => 'Siapa kamu?'
                ]
            ]
        ])->assertJsonStructure([
            "data"
        ]);
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

    public function testSuccessCreateQuestion()
    {
        $this->post('/api/createquestion', [
            'code' => 'sukri',
            'level' => 'advance'
        ])->dump();
    }

    public function testFailedCreateQuestion()
    {
        $this->post('/api/createquestion', [
            'level' => 'advance'
        ])->dump();
    }
}
