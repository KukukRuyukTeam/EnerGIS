<?php

namespace App\Http\Controllers;

use App\Events\QuizRankEvent;
use App\Models\PointQuiz;
use App\Models\SoalQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

        $validator = Validator::make($request->all(), [
            'level' => ['required', 'string', 'in:beginner,intermediate,advance']
        ]);

        if ($validator->fails()) {
            return [
                "code" => 400,
                "errors" => $validator->getMessageBag()
            ];
        }

        $data = $validator->getData();
        $messages = array_merge($this->prompt, [
            [
                'role' => 'user',
                'content' => 'buatkan ' . $jumlahSoal .' soal pilihan ganda tentang energi terbarukan dan jawaban tapi tingkat kesulitannya adalah '. $data['level'] .' tanpa adanya urutan pada jawaban, dengan format json seperti berikut {"soal":[{"pertanyaan" : disini untuk pertanyaan,"pilihan" : [berikan hanya 2 pilihan jawaban],	"jawaban" : berikan disini jawaban yang benarnya }	]} langsung respon dengan format json dan apabila pada value terdapat kata kutipan, maka tambahkan Escape Sequence setiap characternya'
            ]
        ]);

        $res = $this->openAI->chat()->create([
            "model" => "gpt-3.5-turbo",
            "messages" => $messages,
        ]);

        $text = $res['choices'][0]['message']['content'];
        preg_match('/{(?:[^{}]*|(?R))*\}/', $text, $matches);
        if ($matches[0]){
            $jsonObj = json_decode($matches[0]);
            $randomKode = substr(Str::uuid(), 0, 5);
            for ($i=0; $i< count($jsonObj->soal); $i++) {
                $newSoal = new SoalQuiz( (array) $jsonObj->soal[$i]);
                $newSoal->kode = $randomKode;
                $newSoal->save();
            }

            return [
                "kode" => $randomKode,
                "data" => $jsonObj->soal
            ];
        } else {
            return response([
                'code' => 500,
                'errors' => 'gagal membuat soal'
            ], 500);
        }
    }

    public function getQuestions(string $kode)
    {
        $soal = SoalQuiz::where('kode', '=', $kode)
            ->select([
                "id",
                "pertanyaan",
                "pilihan"
            ])
            ->get();
        return [
            "kode" => $kode,
            "data" => $soal
        ];
    }

    public function validateAnswear(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'id_soal' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'kode_soal' => ['required', 'string', 'max:5'],
            'jawaban' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return [
                "code" => 400,
                "errors" => $validator->getMessageBag()
            ];
        }

        $data = $validator->getData();

        $soal = SoalQuiz::where('id', '=', $data['id_soal'])->first();
        if (!$soal->exists()) {
            return [
                "code" => 404,
                "errors" => 'soal tidak diketahui'
            ];
        } elseif ($soal->jawaban != $data['jawaban']) {
            return [
                "id_soal" => $data['id_soal'],
                "kode_soal" => $data['kode_soal'],
                "jawaban" => false
            ];
        }

        $player = PointQuiz::where('nama', '=', $data['nama'])
            ->where('kode_soal', '=', $data['kode_soal'])->first();
        if (!$player) {
            $newPlayer = new PointQuiz($data);
            $newPlayer->jumlah = 10;
            $newPlayer->save();
        } else {
            $player->jumlah += 10;
            $player->save();
        }

        return [
            "id_soal" => $data['id_soal'],
            "kode_soal" => $data['kode_soal'],
            "jawaban" => true
        ];
    }

    public function getRankbyKode(string $kode) {

        $playersPoint = PointQuiz::where('kode_soal', '=', $kode)
            ->select([
                "id",
                "nama",
                "jumlah"
            ])
            ->get();
        return [
            "kode" => $kode,
            "data" => $playersPoint,
        ];

    }
}
