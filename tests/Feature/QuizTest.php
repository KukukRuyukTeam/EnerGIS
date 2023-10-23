<?php

namespace Tests\Feature;

use App\Models\SoalQuiz;
use Database\Seeders\SoalQuizSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuizTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccessCreateQuestion()
    {
        $this->post('/api/createquestion', [
            'level' => 'advance'
        ])->dump();
    }

    public function testFailedCreateQuestion()
    {
        $this->post('/api/createquestion')->dump();
    }

    public function testValidateAnswear()
    {
        $this->seed([SoalQuizSeeder::class]);
        $soal = SoalQuiz::where('jawaban', 'Ya')->first();
        $this->post('/api/validateanswear', [
            "id_soal" => $soal->id,
            "nama" => "player1",
            "kode_soal" => "sukri",
            "jawaban" => "Ya"
        ])->dump();
    }
}
