<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
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

    public function createQuestion(Request $request)
    {
        $jumlahSoal = 5;
        $data = $request->validate([
            'code' => ['required', 'string', 'max:20'],
            'level' => ['required', 'string', 'in:beginner,intermediate,advance']
        ]);

        $messages = array_merge($this->prompt, [
            [
                'role' => 'user',
                'content' => 'buatkan ' . $jumlahSoal .' soal pilihan ganda tentang energi terbarukan dan jawaban tapi tingkat kesulitannya adalah '. $data['level'] .', dengan format json seperti berikut {"soal":[{"pertanyaan" : disini untuk pertanyaan,"pilihan" : [berikan hanya 2 pilihan jawaban],	"jawaban" : berikan disini jawabannya }	]} langsung respon dengan format json dan apabila pada value terdapat kata kutipan, maka tambahkan Escape Sequence setiap characternya'
            ]
        ]);

        $res = $this->openAI->chat()->create([
            "model" => "gpt-3.5-turbo",
            "messages" => $messages,
        ]);

        $text = $res['choices'][0]['message']['content'];
        preg_match('/{(?:[^{}]*|(?R))*\}/', $text, $matches);
        if ($matches[0]){
            $json = json_decode($matches[0]);
            return ["data" => $json->soal];
        } else {
            return response([
                'code' => 500,
                'errors' => 'gagal membuat soal'
            ], 500);
        }
    }

    public function validateAnswear(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'code' => ['required', 'string', 'max:20'],
            'choice' => ['required', 'string']
        ]);
    }
}
