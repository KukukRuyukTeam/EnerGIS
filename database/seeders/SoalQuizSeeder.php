<?php

namespace Database\Seeders;

use App\Models\SoalQuiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoalQuiz::create([
            "pertanyaan" => "Apakah energi angin dapat dikategorikan sebagai energi terbarukan?",
            "kode" => "sukri",
            "pilihan" => ["Ya","Tidak"],
            "jawaban" => "Ya"
        ]);
    }
}
