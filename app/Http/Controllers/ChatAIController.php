<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatAIRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ChatAIController extends Controller
{
    private string $API_KEY;
    private array $prompt;
    private $openAI;

    public function __construct()
    {
        $config = require __DIR__.'/../../../config/openai.php';
        $this->API_KEY = $config['api_key'];
        $this->openAI = \OpenAI::client($this->API_KEY);
        $this->prompt = [
            [
                'role' => "system",
                'content' => 'Kamu adalah bot yang berfungsi sebagai ChatBot yang mana berada pada website yang bernama EnerGIS, dan website ini berisi tentang informasi energi terbarukan yang berada di indonesia'
            ]
        ];
    }

    public function getAnswear(ChatAIRequest $request)
    {
        $data = $request->validated();

        $messages = array_merge($this->prompt, $data['messages']);
        $response = $this->openAI->chat()->create([
            "model" => "gpt-3.5-turbo",
            "messages" => $messages,
            "max_tokens" => 1000
        ]);

        return ["data" => $response['choices'][0]['message']['content']];
    }

}
