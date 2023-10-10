<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PLTATest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertSuccess()
    {
        for ($i=0; $i<50; $i++) {
            $response = $this->post('/api/pembangkit/plta', [
                'nama' => 'PLTA Bogor',
                'tipe_pembangkit' => 'Generator',
                'unit_pembangkit' => 'Generator 1',
                'longitude' => -6.589169556757834 + ("-0.00000000" . random_int(1, 50)),
                'latitude' => 106.8061123132633 + ("0.00" . random_int(50, 200)),
                'deskripsi' => "Adalah PLTA",
                'lokasi' => 'Bogor',
                'kapasitas' => 30.5,
                'gambar' => 'testGambar.png'
            ])
                ->assertStatus(201)
                ->assertJsonStructure([  // Bisa juga cek id kalau tidak kosong
                    "data" => [
                        'id',
                        'id_pl',
                        'tipe_pembangkit',
                        'unit_pembangkit',
                        'pembangkit'
                    ]
                ]);


        }
        return $response['data']['id'];
    }

    public function testInsertFailed(): void
    {
        $this->post('/api/pembangkit', [
            'nama' => 'PLTA Bogor',
            'tipe_pembangkit' => 'Generator',
            'unit_pembangkit' => 'Generator 1',
            'deskripsi' => "Adalah PLTA",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    'longitude' => [

                    ],
                    'latitude' => [

                    ],
                ]
            ]);
    }

    public function testUpdate(): void
    {

        $id = $this->testInsertSuccess();
        $response = $this->put('/api/pembangkit/plta/' . $id, [
            'nama' => 'PLTA Bogo',
            'tipe_pembangkit' => 'Generator99',
            'unit_pembangkit' => 'Generator 1',
            'longitude' => -6.589169556757834,
            'latitude' => 106.8061123132633,
            'deskripsi' => "Adalah PLTA",
            'lokasi' => 'Bogor',
            'kapasitas' => 30.5,
            'gambar' => 'testGambar.png'
        ]);

        echo $response->dump();
    }

    public function testDelete(): void
    {
        $id = $this->testInsertSuccess();
        $response = $this->delete('/api/pembangkit/plta/' . $id);

        echo $response->dump();
    }

    public function  testFindNear(): void
    {
        $this->testInsertSuccess();
        $response = $this->get('/api/pembangkit/plta/nearby?' .
            'distance=1000000&latitude=106.81431231326&longitude=-6.5891695608578');
        echo $response->dump();
    }
}
